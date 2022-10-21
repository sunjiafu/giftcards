<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public $query;
    public $products;
    public $highlightIndex;




    public function rest(){

        $this->products =[];

        $this->query='';
        $this->highlightIndex = 0;
    }
 
    public function selectContact()
    {
        $contact = $this->products[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('/'));
        }
    }
 
    public function updatedQuery()
    {
        $this->products = Product::where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function product(){

        return redirect()->to('product');
    }
    

    public function render()
    {
        return view('livewire.search');
    }
}

