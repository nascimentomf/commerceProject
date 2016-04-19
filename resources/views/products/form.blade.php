@extends('master')
@Section('title', 'Products')

@Section('content')
  <h3>Products Section </h3>
<!-- Trabalhando um unico formulario criacao/edicao dos registros-->
@if (isset($product))
     <!-- Model Form: trazer os dados a partir do model-->
    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
@else
    {!! Form::open(['route' => 'products.store', 'method' => 'put']) !!}
@endif

<div class="form-group">
{!! Form::label('name', 'Name: ') !!}
{!! Form::text('name', null,['class' => 'form-control']) !!}

    {!! Form::label('category_id', 'Category: ') !!}
    {!! Form::select('category_id', $categories, null,['class' => 'form-control']) !!}

{!! Form::label('price', 'Price: ') !!}
{!! Form::text('price', null, ['class' => 'form-control']) !!}

{!! Form::label('featured', 'Featured: ') !!}
{!! Form::checkbox('featured') !!}

{!! Form::label('recommend', 'Recommend: ') !!}
{!! Form::checkbox('recommend') !!}
<br />
{!! Form::label('description', 'Description: ') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<a href="{{route('products')}}" class="btn btn-default">Voltar</a>
{!! Form::submit('Save') !!}


{!! Form::close() !!}

@endSection
