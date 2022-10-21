<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductlistHome extends Component
{
    public function render()
    {

        return view('livewire.productlist-home',['products'=>Product::withCount('reviews')->orderBy('reviews_count','desc')->take(8)->get()]);
    }
}
