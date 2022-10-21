<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


use App\Models\Product as Item;

class Product extends Component
{

    use WithPagination;


    public $categoryId;



    public function updateingCategoryId()
    {

        $this->resetPage();
    }




    public function render()
    {

        if (!$this->categoryId)

            $product = Item::withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(9, ['*']);

        else

            $product = Item::where('category_id', $this->categoryId)->withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(9, ['*']);

        return view('livewire.product', ['product' => $product, 'category' => Category::all()]);
    }
}
