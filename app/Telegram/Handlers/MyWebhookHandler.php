<?php

namespace App\Telegram\Handlers;


use App\Jobs\OrderExpired;
use App\Models\Category;
use App\Models\Product;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Pay;
use App\Service\OrderProcessService;
use App\Service\Pay\Usdtpay;
use App\Service\Pay\Btcpay;
use BTCPayServer\Util\PreciseNumber;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class MyWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{

    private ?string $currency = '';

    private ?float $price;

    public function __construct(OrderProcessService $ops, Usdtpay $usdtpay, Btcpay $btcpay)
    {
        $this->ops = $ops;
        $this->usdtpay = $usdtpay;
        $this->btcpay = $btcpay;
    }

    public function start(): void
    {

        $this->chat->markdown("\n\n")->replyKeyboard(ReplyKeyboard::make()->buttons([
        ReplyButton::make('Reviews')

        ]))->send();
        $this->chat->markdown("
        *Buy Giftcards Online best offer*
 
        ✅ Online Email Delivery

        ✅ Safe, Secure Purchase

        ✅ No Expiration Date\n\n ")
            ->keyboard(

                Keyboard::make()->buttons([

                    Button::make('🛒Buy Now')->action('product'),

                ])

            )
            ->send();

            
    }

    public function Product()
    {
        $this->chat->deleteMessage($this->messageId)->send();
        $this->deleteKeyboard();

        $specialitieKeyboards = [];
        foreach (Category::all() as $specialitiy) {
            $specialitieKeyboards[] = Button::make($specialitiy->name)->action('productcate')->param('category', $specialitiy->id);
        }
        $this->chat->markdown('*What Gift Card Do You Want To Buy ?*')

            ->keyboard(
                Keyboard::make()->buttons($specialitieKeyboards)->chunk(
                    4
                )
            )

            ->send();
    }

    public function ProductCate()
    {

        $this->chat->deleteMessage($this->messageId)->send();
        $this->deleteKeyboard();

        $product = [];
        $data = $this->callbackQuery->data()->get('category');
        $productlist = Product::where('category_id', $data)->get();

        foreach ($productlist as $products) {

            $product[] = Button::make($products->name)->action('productdatil')->param('product', $products->id);
            # code...
        }

        $this->chat->markdown('*What Gift Card Do You Want To Buy ?*')

            ->keyboard(
                Keyboard::make()
                    ->row($product)
                    ->row([Button::make('BAck')->action('product'),])

            )

            ->send();
    }
    public function Productdatil()
    {

        $this->chat->deleteMessage($this->messageId)->send();
        $this->deleteKeyboard();

        $productId = $this->callbackQuery->data()->get('product');
        $product = Product::with('amount')->where('id', $productId)->first();



        switch ($product->country) {

            case 'USA';
                $this->currency = '$';
                break;
            case 'UK';
                $this->currency = '￡';
                break;
            case 'EU';
                $this->currency = '€';
                break;
        }



        $productkeyboads = [];

        foreach ($product->amount as $products) {

            $productkeyboads[] = Button::make($this->currency . $products->amount)->action('checkout')->param('productid', $product->id)->param('amount', $products->amount);
            # code...
        }

        $this->chat->markdown('*Choose Giftcard Amount *')

            ->keyboard(
                Keyboard::make()
                    ->row($productkeyboads)
                    ->row([Button::make('BAck')->action('product'),])

            )

            ->send();
    }


    public function checkout()
    {

        $this->chat->deleteMessage($this->messageId)->send();
        $this->deleteKeyboard();

        $amount = $this->callbackQuery->data()->get('amount');  //获取产品面额

        $productiD = $this->callbackQuery->data()->get('productid'); //获取产品ID

        $product = Product::where('id', $productiD)->first();   //获取产品实例

        $country = $product->country;    //获取产品所属国家

        $this->price = $this->ops->Price($country, (int)$amount);   //设置价格

        $buyeremail = $this->chat->chat_id . '@giftcardssupplier.com';  //设置买家Email

        /**
         * 构建订单信息
         */

        $order = new Order;

        //生成order_sn
        $order->order_sn = Str::random(16);
        //生成产品ID
        $order->product_id = $productiD;
        //生成订单标题
        $order->title = $product->name . '>>' .   $amount;
        //生成订单价格
        $order->price =   $this->price;
        //获取买家邮箱
        $order->buyeremail = $buyeremail;
        //获取支付方式
        $order->pay_id = 1;
        //保存订单信息
        $order->save();

        //设置订单过期时间
        $ExpiredOrderTime = now();
        OrderExpired::dispatch($order->order_sn)->delay($ExpiredOrderTime->addMinutes(30));

        /**
         * 
         * 获取支付方式
         */

        $paykeyboad = [];

        foreach (Pay::all() as $payway) {

            $paykeyboad[] = Button::make($payway->pay_name)->action('bill')->param('payway', $payway->pay_name)->param('orderSn', $order->order_sn);
            # code...
        }


        $this->chat->markdown('*Product*:' . $product->name . '||' . $amount .
            "  \n\n*Price*:" . "$" . $order->price . "\n\n*Choose payment method 👇*")

            ->keyboard(
                Keyboard::make()
                    ->row($paykeyboad)

                    ->row([Button::make('BAck')->action('product'),])


            )

            ->send();
    }


    public function Bill()
    {

        $this->chat->deleteMessage($this->messageId)->send();
        $this->deleteKeyboard();

        //获取用户选中的支付方式
        $payway = $this->callbackQuery->data()->get('payway');
        //获取Ordersn
        $orderSN = $this->callbackQuery->data()->get('orderSn');
        //获取Order
        $order = Order::where('order_sn', $orderSN)->first();
        //创建发票
        switch ($payway) {

            case ('Usdt(Trc20)'):

                $amount = (float)$order->price;

                $checkout = $this->usdtpay->CreateInvoice($amount, $order->order_sn);

                $checkoutlink = $checkout['data']['payment_url'];

                break;

            case ('Bitcoin'):

                $amount = PreciseNumber::parseString($order->price);


                $bitcoin = $this->btcpay->CreateInvoice($amount, $order->order_sn, $order->buyeremail);

                $checkoutlink = $bitcoin['checkoutLink'];
                break;
        }

        $this->chat->markdown("*Confirm the order*\n\n *OrderId*:" . $orderSN .
            "\n\n*Product*:" . $order->title .
            "\n\n*Price*:" . $order->price .
            "\n\n*payment method*:" . $payway .
            "\n\n ⚠️Orders that are not paid within 30 minutes will be voided")
            ->keyboard(
                Keyboard::make()

                    ->row([

                        Button::make('Checkout')->webApp($checkoutlink),
                        Button::make('Check Order Status')->action('Orderstatus')->param('orderSn', $order->order_sn)
                    ])
                    ->row([Button::make('BAck')->action('product')])
            )
            ->send();
    }

    public function Orderstatus()
    {

        $ordersn = $this->callbackQuery->data()->get('orderSn');

        $order = Order::where('order_sn', $ordersn)->first();


        if (!$order) {

            $this->chat->markdown('You do not have an order')->keyboard(Keyboard::make()->row(

                [Button::make('Create Order')->action('product')]
            ))->send();
        }

        switch ($order->status) {

            case -1:
                $this->chat->markdown('The order has expired, please place a new order')->send();
                break;
            case 1:
                $this->chat->markdown('Your order is pending payment')->send();
                break;
        }
    }
}
