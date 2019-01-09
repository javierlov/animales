@extends('layouts.app')
@section('content')
@include('products.fragment.aside')
<div class="col-sm-9">
    @include('products.fragment.info')
    @include('error')
    <h2>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary pull-right">Editar</a>
    </h2>
    {!! Form::model($product, ['route' => ['products.index', $product->id], 'method' => 'GET']) !!}
        @include('products.fragment.form', ['accion_title'=>'Ver', 'editable'=>'disabled'])
    {!! Form::close() !!}
</div>


@endsection