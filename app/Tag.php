<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    //Relacionamento Image to Product
    //@author  Moises <moises.fn@gmail.com>
    public function products(){
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
