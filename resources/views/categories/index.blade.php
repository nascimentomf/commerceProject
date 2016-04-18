@extends('master')
@Section('title', 'Categories')

@Section('content')
 <h3>Categories Section <a href="#new" class="btn btn-default">New Category</a></h3>
<table class="table">
 <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th colspan="2">Action</th>
 </tr>
 @foreach($categories as $category)
     <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
      <td>Edit</td>
      <td>Delete</td>
     </tr>
 @endforeach
</table>
{!! $categories->render() !!}
@endSection
