<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Reviews as Review;

class Reviews extends Component
{



    public Product $product;

    public $product_id;

    public function mount(){

     

        $this->product = New Product;

   
    }
    public function render()
    {
        return view('livewire.reviews',['reviews'=>Review::query()->orderByRaw('date DESC')->paginate(20)]);
    }
}
