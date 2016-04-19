@extends('master')
@Section('title', 'Products')

@Section('content')
  <h3>Products Section <a href="{{route('products.create')}}" class="btn btn-default">New Product</a></h3>

  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Category</th>
      <th colspan="3">Action</th>
    </tr>
    @foreach($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->category->name}}</td>
      <td>Image</td>
      <td><a href="{{route('products.edit', ['id'=>$product->id])}}">Edit</a></td>
      <td><a href="{{route('products.destroy', ['id'=>$product->id])}}">Delete</a></td>
    </tr>
    @endforeach
  </table>
  {!! $products->render() !!}
@endSection
