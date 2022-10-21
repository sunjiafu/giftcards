<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;
 
    public function Product(){

        return $this->belongsToMany(Product::class,'amount_product','product_id','amount_id')->orderBy('date DESC');
    }
}
