<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
class Orderdeail extends Component
{

    public $order;

    public function mount($order_sn){

        $this->order = Order::query()->where('order_sn',$order_sn)->first();
    }
    public function render()
    {
        

        return view('livewire.orderdeail');
    }
}
