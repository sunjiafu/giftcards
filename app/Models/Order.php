<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

      /**
     * 待支付
     */
    const STATUS_WAIT_PAY = 1;

    /**
     * 待处理
     */
    const STATUS_PENDING = 2;

    /**
     * 处理中
     */
    const STATUS_PROCESSING = 3;

    /**
     * 已完成
     */
    const STATUS_COMPLETED = 4;

    /**
     * 失败
     */
    const STATUS_FAILURE = 5;

    /**
     * 过期
     */
    const STATUS_EXPIRED = -1;

    protected $guarded = [];

    //状态映射

    public static function getStatusMap(){
return[

  self::STATUS_WAIT_PAY => admin_trans('order.fields.status_wait_pay'),
  self::STATUS_PENDING => admin_trans('order.fields.status_pending'),
  self::STATUS_PROCESSING => admin_trans('order.fields.status_processing'),
  self::STATUS_COMPLETED => admin_trans('order.fields.status_completed'),
  self::STATUS_FAILURE => admin_trans('order.fields.status_failure'),
  self::STATUS_EXPIRED => admin_trans('order.fields.status_expired')
];
     
    }

   
}
