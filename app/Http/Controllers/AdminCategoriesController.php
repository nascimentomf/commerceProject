<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Model Category instance
    protected $categoryModel;
    
    public function __construct(Category $categoryModel){
        $this->categoryModel = $categoryModel;
    }

    public function index(){
        $categories = $this->categoryModel->paginate(10);
        
        return view('categories.index', compact('categories'));
    }
    //Novo cadastro - Formulario
    public function create()
    {
        return view('categories.form');
    }
    //Novo cadastro - Gravar
    public function store(Request $request)
    {
        $input = $request->all();

        $category = $this->categoryModel->create($input);

        return redirect()->route('categories');
    }

    //Editando cadastro - Formulario, requer select com as categorias cadastradas
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('categories.form', compact('category'));
    }
    //Editando cadastro - Gravar, realiza o update do registro em edicao
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $category = $this->categoryModel->find($id);

        $category->fill($input);
        $category->save();

        return redirect()->route('categories');
    }

    //Apagar registro da base de dados
    public function destroy($id)
    {
        $category = $this->categoryModel->find($id)->delete();

        return redirect()->route('categories');
    }
}
