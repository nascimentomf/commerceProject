<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    //Relacionamento Image to Product
    public function products(){
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
