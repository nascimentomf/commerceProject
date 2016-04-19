@extends('master')
@Section('title', 'Images')

@Section('content')
  <h3>Images Section <a href="{{route('products.images.create', ['id' => $product->id])}}" class="btn btn-default">New Images</a></h3>

  <table class="table">
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Extension</th>
      <th>Action</th>
    </tr>
    @foreach($images as $image)
    <tr>
      <td>{{$image->id}}</td>
      <td><img src="/uploads/{{$image->id}}.{{$image->extension}}" width="30px" /></td>
      <td>{{$image->extension}}</td>
      <td><a href="{{route('products.images.destroy', ['id'=>$image->id])}}">Delete</a></td>
    </tr>
    @endforeach
  </table>
  {!! $images->render() !!}
  <a href="{{route('products')}}" class="btn btn-default">Back</a>
@endSection
