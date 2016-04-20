<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Contracts\Filesystem\Factory;
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
        //string tags = tag1, tag2, tag3
        //1- separar tags
        //2 - remover espacos (trim)
        //3- salvar tags e 
        //4 - sync para atribuir to Product
        //Funcao
        //recebe os ids das tags do produto
        $tags = $this->tagsToCollection($input['tag']);
        //cadastra o produto
        $product = $this->productModel->create($input);
        //relaciona Product to Tag
        $product->tags()->sync($tags);
        
        return redirect()->route('products');
    }
    
    //Editando cadastro - Formulario, requer select com as categorias cadastradas
    public function edit(Category $category, $id)
    {
        $product = $this->productModel->find($id);
        $product->tag = $product->tag_list;
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
        // update de tags
        $tags = $this->tagsToCollection($input['tag']);
        $product->tags()->sync($tags);
        
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
    
    /**
     * Images actions
     */
    
    //listar imagens do produto
    public function images(ProductImage $images, $id){
        $product = $this->productModel->find($id);
        $images = $product->images()->paginate(10);
        
        return view('products.image', compact('images', 'product'));
    }
    
    //Novo upload de imagem
    public function images_create($id){
        $product = $this->productModel->find($id);
        return view('products.image_form', compact('product'));
    }

    //Novo upload de imagem
    public function images_store(Requests\ProductImageRequest $request, \CodeCommerce\ProductImage $productImage, \Illuminate\Contracts\Filesystem\Factory $fs, $id){
        //upload da imagem e gravar registro do DB
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        //insercao db
        $productImage = $productImage->create(['product_id'=>$id, 'extension'=>$extension]);
        //upload
        $fs->disk('public_local')->put($productImage->id.'.'.$productImage->extension,file_get_contents($file));

        return redirect()->route('products.images', ['id'=>$id]);

    }

    //Apagar imagem
    public function images_destroy(\CodeCommerce\ProductImage $productImage, \Illuminate\Contracts\Filesystem\Factory $fs, $id){
        //deletar registro do DB
        //deletar imagem do filesystem
        $image = $productImage->find($id);
        $product_id = $image->product_id;

        // apaga arquivo,se existir no disco
        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            $fs->disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $image->delete();

        return redirect()->route('products.images', ['id'=>$product_id]);
    }

    //Funcao cadastro de tags
    public function tagsToCollection($tag){
        $tags = explode(',',$tag);
        $tags = array_map('trim', $tags);

        $tagArray = [];
        //percorrer tags
        foreach ($tags as $tag_name){
            $tagArray[] = Tag::firstOrCreate(['name'=> $tag_name])->id;
        }

        return $tagArray;
    }

}
