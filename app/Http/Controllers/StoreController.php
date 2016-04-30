<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $category;
    private $product;
    
    public function __construct(\CodeCommerce\Category $category, \CodeCommerce\Product $product)
    {
	    $this->category = $category;
	    $this->product = $product;
    }
    
    public function index()
    {
        $pFeatured = $this->product->featured()->get();
        $pRecommend = $this->product->recommend()->get();
	    $categories = $this->category->all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function describe_category($id)
    {
        $categories = $this->category->all();
        $products = $this->category->find($id)->products;
        return view('store.category_detail', compact('categories','products'));
    }

    public function show_product($id)
    {
        $categories = $this->category->all();
        $product = $this->product->find($id);
        return view('store.product_detail', compact('categories','product'));
    }
}
