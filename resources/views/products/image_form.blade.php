@extends('master')
@Section('title', 'Images')

@Section('content')
  <h3>Images Section </h3>
<!-- Trabalhando um unico formulario criacao/edicao dos registros-->
{!! Form::open(['route' => ['products.images.store', 'id'=>$product->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group">
{!! Form::label('image', 'Selecionar Imagem...') !!}
{!! Form::file('image') !!}
</div>

<a href="{{route('products.images',['id' => $product->id])}}" class="btn btn-default">Back</a>
{!! Form::submit('Save') !!}

{!! Form::close() !!}

@endSection
