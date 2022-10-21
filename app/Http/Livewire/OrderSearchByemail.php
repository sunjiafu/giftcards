<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\OrderProcessService;

class OrderSearchByemail extends Component
{

    public $order;

    public $email;

    public $errmessage;

  

    public function OrderSearchByemail(OrderProcessService $ops){

        $this->order = $ops->OrderSarchByemail($this->email);

        return $this->order;

    

        
    }

    public function Error(){

        $this->errmessage = "该邮箱没有订单";
    }
    public function render()
    {
        return view('livewire.order-search-byemail');
    }
}
