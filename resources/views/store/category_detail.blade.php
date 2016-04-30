@extends('store.store')
@Section('content')

                    @if($products->count())
                    <h2 class="title text-center">Categoria: {{$products->first()->category->name}}</h2>
                    @foreach($products as $product)


                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">


                                    @if($product->images->count())
                                        <img src='/uploads/{{$product->images->first()->id.'.'.$product->images->first()->extension}}' alt="" />
                                    @else
                                        <img src="{{url('/images/no-img.jpg')}}" alt=""/>
                                    @endif

                                    <h2>R$  {{$product->price}}</h2>
                                    <p> {{$product->name}}</p>
                                    <a href="{{route('product.detail', $product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$  {{$product->price}}</h2>
                                        <p> {{$product->name}}</p>
                                        <a href="{{route('product.detail', $product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                        <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach

                    @else
                        <h2 class="title text-center">Não existem produtos cadastrados nessa categoria.</h2>
                    @endif




@endSection