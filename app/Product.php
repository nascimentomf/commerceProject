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
    ];
    // Relacionamento Product to Category
    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }
}
