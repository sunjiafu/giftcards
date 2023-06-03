<?php

namespace App\Http\Livewire;

use App\Models\Carmis;
use App\Models\Order;
use App\Models\Product;

use Livewire\Component;
use App\Service\Pay\Usdtpay;
use App\Service\Pay\Btcpay;
use BTCPayServer\Util\PreciseNumber;

class Bill extends Component
{

    public $order;

    public function mount($order_sn)
    {

        $this->order = Order::where('order_sn', $order_sn)->first();
    }

    public function checkout(Usdtpay $usdtpay, Btcpay $btcpay)
    {



        switch ($this->order->pay_id) {

            case (2):

                $amount = (float)$this->order->price;

                $checkout = $usdtpay->CreateInvoice($amount, $this->order->order_sn);

                return redirect()->to($checkout['data']['payment_url']);

                break;

            case (3):

                $amount = PreciseNumber::parseString($this->order->price);


                $bitcoin = $btcpay->CreateInvoice($amount, $this->order->order_sn, $this->order->buyeremail);
                return redirect()->to($bitcoin['checkoutLink']);
                break;
        }
    }

    public function buyagain()
    {



        return redirect()->to(url('product',Product::find($this->order->product_id)->url));
    }

    public function render()

    {




        return view('livewire.bill');
    }
}
