<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carmis extends Model
{
    use HasFactory;

    
    /**
     * 未售出
     */
    const STATUS_UNSOLD = 1;

    /**
     * 已售出
     */
    const STATUS_SOLD = 2;

    public function Product(){
   

        $this->belongsTo(Product::class,'product_id');

    }
}
