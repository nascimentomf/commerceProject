@extends('store.store')
@Section('content')

                    <h2 class="title text-center">{{$product->category->name}}</h2>
                    <h3 class="title text-center">{{$product->name}}</h3>

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
                                    <p> {{$product->description}}</p>


                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$  {{$product->price}}</h2>
                                        <p> {{$product->name}}</p>

                                        <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



@endSection