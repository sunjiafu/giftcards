<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Product extends Model
{
    use HasFactory;


  

    //    关联分类
    public function Category()
    {

        return $this->belongsTo(Category::class, 'category_id');
    }
    // 关联面额
    public function Amount()
    {

        return $this->belongsToMany(Amount::class,'amount_product','product_id','amount_id')->orderBy('amount_id');
    }

    //关联卡密
    public function Carmis()
    {

        return $this->hasMany(Carmis::class, 'product_id');
    }

      //关联评论
      public function Reviews()
      {
  
          return $this->hasMany(Reviews::class, 'product_id');
      }
}
