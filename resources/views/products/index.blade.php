@extends('master')
@Section('title', 'Products')

@Section('content')
  <h3>Products Section <a href="#new" class="btn btn-default">New Product</a></h3>
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
      <td>Edit</td>
      <td>Delete</td>
    </tr>
    @endforeach
  </table>
  {!! $products->render() !!}
@endSection
