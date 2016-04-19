<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'featured',
        'recommend',
    ];
    // Relacionamento Product to Category
    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }

    //Relacionamento Product to Image
    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }
}
