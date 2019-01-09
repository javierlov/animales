@extends('layouts.app')
@section('content')
@include('products.fragment.aside')

<div class="col-sm-8">
    @include('error')
    
    {!! Form::open(['route' => 'products.store']) !!}
        @include('products.fragment.form', ['accion_title'=>'Nuevo', 'editable'=>'enabled'])
    {!! Form::close() !!}
</div>
@endsection