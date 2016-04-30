<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
    // Relacionamento Category to Product
    public function products(){
        return $this->hasMany('CodeCommerce\Product');
    }
}
