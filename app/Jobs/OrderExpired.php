<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderExpired implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     private $ordersn;
    public function __construct($ordersn)
    {
        //
        $this->ordersn =$ordersn;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $order = Order::query()->where('order_sn',$this->ordersn)->first();


      if($order->status ==Order::STATUS_WAIT_PAY){

        $order->update(['status'=>Order::STATUS_EXPIRED]);
      }
    }
}
