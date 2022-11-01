<?php

namespace App\Service;

use App\Models\Carmis;
use App\Models\Order;
use Error;


class OrderProcessService

{

    /**
     * 通过邮件查询订单,查询显示最近的5条记录
     *@param string $buyermail
    
     */

    public function OrderSarchByemail($buyermail)
    {

        $order = Order::where('buyeremail', $buyermail)->orderBy('updated_at', 'desc')->take(5)->get();

        return $order;
    }
    /**
     * 通过商品去除一定数量的未售出卡密
     * 
     * @param int $product_id 商品ID
     * @param int $byAmount 数量
     *  */

    public function TakeCarmi(int $product_id, int $byAmount)
    {

        $code = Carmis::query()
            ->where('product_id', $product_id)
            ->where('status', Carmis::STATUS_UNSOLD)
            ->take($byAmount)
            ->first();

        return $code;
    }

    /**
     * 价格和国家设置
     *
     *
     * @param string $country 价格设置
     * 
     * 
     * @param float $price
     * 
     * 
     
     */

    public function Price($country, $amount)
    {


        if ($country == 'USA') {

            switch ($amount) {

                case (50):

                    $price = 40;
                    break;
                case (100):

                    $price  = 65;
                    break;
                case (200):

                    $price  = 120;
                    break;
                case (500):

                    $price  = 210;
                    break;
                case (1000):

                    $price  = 350;
                    break;
                case (2000):

                    $price  = 580;
                    break;
            }
        } elseif ($country == 'UK') {

            switch ($amount) {

                case (50):

                    $price  = 54.24;
                    break;
                case (100):

                    $price  = 88.24;
                    break;
                case (200):

                    $price  = 159;
                    break;
                case (500):

                    $price  = 278;
                    break;
                case (1000):

                    $price  = 350;
                    break;
                case (2000):

                    $price  = 580;
                    break;
            }
        } elseif ($country == 'EU') {

            switch ($amount) {

                case (50):

                    $price  = 45;
                    break;
                case (100):

                    $price  = 74;
                    break;
                case (200):

                    $price  = 136;
                    break;
                case (500):

                    $price  = 238;
                    break;
                case (1000):

                    $price  = 238;
                    break;
                case (2000):

                    $price  = 580;
                    break;
            }
        }

        return $price;
    }




    /**
     * 通过id集合设置卡密已售出
     *
     * @param array $ids 卡密id集合
     * @return bool
     *
     
     */

    public function soldByIDS($ids)
    {

        return Carmis::query()->whereIn('id', $ids)->update(['status' => Carmis::STATUS_SOLD]);
    }

    /**
     * 订单成功方法
     *
     * @param string $order_sn 订单号
     * @param $price 支付金额
     * @return Order 
     *
     */

    public function completedOrder(string $order_sn)
    {

        //获取订单详情

        $order = new Order;

        $orderdetail = $order->where('order_sn', $order_sn)->first();


        //如果返回数据为空

        //如果已经处理

        //获取卡密

        $code = $this->TakeCarmi($orderdetail->product_id, 1);


        //如果没有未售出的卡密，抛出异常
        if (!$code) {

            throw  new Error('库存不足');
        }


        //将卡密存入订单
        $orderdetail->code = $code->carmi;


        //更新订单状态为已完成
        $orderdetail->status = Order::STATUS_COMPLETED;

        $orderdetail->save();

        //将卡密设置为已出售状态

        $this->soldByIDS([$code->id]);


        return 'Success';
    }
}
