<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    // Model Products Instance
    protected $productModel;
    public function __construct(Product $productModel){
        $this->productModel = $productModel;
    }
    
    //listagem dos registros cadastrados, com paginacao.
    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }
    
    //Novo cadastro - Formulario, requer select com as categorias cadastradas
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.form', compact('categories'));
    }
    //Novo cadastro - Gravar, teste os parametros de featured e recommend
    public function store(Requests\AdminProductRequest $request)
    {
        $input = $request->all();
        $input['featured'] = $request->get('featured') ? true: false;
        $input['recommend'] = $request->get('recommend') ? true: false;

        $product = $this->productModel->create($input);

        return redirect()->route('products');
    }
    
    //Editando cadastro - Formulario, requer select com as categorias cadastradas
    public function edit(Category $category, $id)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.form', compact('product', 'categories'));
    }
    //Editando cadastro - Gravar, realiza o update do registro em edicao
    public function update(Requests\AdminProductRequest $request, $id)
    {
        $input = $request->all();
        $input['featured'] = $request->get('featured') ? true: false;
        $input['recommend'] = $request->get('recommend') ? true: false;

        $product = $this->productModel->find($id);

        $product->fill($input);
        $product->save();

        return redirect()->route('products');
    }
    //Apagar registro da base de dados
    public function destroy($id)
    {
        $product = $this->productModel->find($id)->delete();
        
        return redirect()->route('products');
    }
}
