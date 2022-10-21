<?php

namespace App\Http\Livewire;

use App\Jobs\OrderExpired;
use App\Models\Amount;
use App\Models\Order;
use App\Models\Pay;
use App\Models\Product;
use App\Models\Reviews;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Service\OrderProcessService;



class ProductShow extends Component
{


    public $amount;

    public $price;

    public $pay = 2;

    public $blance;

    public $buyeremail;

 

    public $status;




    protected function rules()
    {
        return [
            'amount' => 'required',
            'payway' => 'required',
            'buyeremail' => 'required|email',

        ];
    }

    public function mount($url)
    {
      
        $this->blance = Product::where('url', $url)->first();
        $this->payway = Pay::all();
  
        $this->status = $this->amount;
    }



    public function updatedAmount()
    {

        if ($this->blance->country == 'USA') {

            switch ($this->amount) {

                case (50):

                    $this->price = 40;
                    break;
                case (100):

                    $this->price = 65;
                    break;
                case (200):

                    $this->price = 120;
                    break;
                case (500):

                    $this->price = 210;
                    break;
                case (1000):

                    $this->price = 350;
                    break;
                case (2000):

                    $this->price = 580;
                    break;
            }
        }elseif($this->blance->country == 'UK'){

            switch ($this->amount) {

                case (50):

                    $this->price = 54.24;
                    break;
                case (100):

                    $this->price = 88.24;
                    break;
                case (200):

                    $this->price = 159;
                    break;
                case (500):

                    $this->price = 278;
                    break;
                case (1000):

                    $this->price = 350;
                    break;
                case (2000):

                    $this->price = 580;
                    break;

            }

        }elseif($this->blance->country == 'EU'){

            switch ($this->amount) {

                case (50):

                    $this->price = 45;
                    break;
                case (100):

                    $this->price = 74;
                    break;
                case (200):

                    $this->price = 136;
                    break;
                case (500):

                    $this->price = 238;
                    break;
                case (1000):

                    $this->price = 238;
                    break;
                case (2000):

                    $this->price = 580;
                    break;

            } 
        }
    }

    public function OrderSave()
    {

        //验证数据
        $this->validate();

        $order = new Order;

        //生成order_sn
        $order->order_sn = Str::random(16);
        //生成产品ID
        $order->product_id = $this->blance->id;
        //生成订单标题
        $order->title = $this->blance->name . '>>' . $this->amount;;
        //生成订单价格
        $order->price = $this->price;
        //获取买家邮箱
        $order->buyeremail = $this->buyeremail;
        //获取支付方式
        $order->pay_id = $this->pay;
        //保存订单信息
        $order->save();

        //设置订单过期时间
        $ExpiredOrderTime = now();
        OrderExpired::dispatch($order->order_sn)->delay($ExpiredOrderTime->addMinutes(30));

        return redirect()->route('bill', $order->order_sn);
    }

    public function render()
    {




        return view(
            'livewire.product-show',['reviews'=>Reviews::where('product_id', $this->blance->id)->orderByRaw('date DESC')->paginate(20)]
        );
    }
}
