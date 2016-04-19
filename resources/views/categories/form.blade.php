@extends('master')
@Section('title', 'Categories')

@Section('content')
  <h3>Categories Section </h3>
<!-- Trabalhando um unico formulario criacao/edicao dos registros-->
@if (isset($category))
     <!-- Model Form: trazer os dados a partir do model-->
    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
@else
    {!! Form::open(['route' => 'categories.store', 'method' => 'put']) !!}
@endif

<div class="form-group">
{!! Form::label('name', 'Name: ') !!}
{!! Form::text('name', null,['class' => 'form-control']) !!}

{!! Form::label('description', 'Description: ') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<a href="{{route('categories')}}" class="btn btn-default">Voltar</a>
{!! Form::submit('Save') !!}


{!! Form::close() !!}

@endSection
