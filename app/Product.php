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

    //Relacionamento Product to Tag
    public function tags(){
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    //Atributo tags (lista)
    public function getTagListAttribute(){
        $tags = $this->tags->lists('name')->toArray();

        return implode(', ', $tags);
    }
    
    //Pesquisa de escopo
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }
}
