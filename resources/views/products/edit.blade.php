@extends('layouts.app')
@section('content')
@include('products.fragment.aside')

<div class="col-sm-8">
    @include('error')
    
    {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
        @include('products.fragment.form', ['accion_title'=>'Editar', 'editable'=>'enabled'])
    {!! Form::close() !!}
</div>

@endsection