@extends('layouts.app')

@section('content')
         @include('clientes.fragment.aside')
<div class="col-sm-8">
    @include('clientes.fragment.error')
    
    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'PUT']) !!}
        @include('clientes.fragment.form', ['accion_title'=>'Editar', 'editable'=>'enabled'])
    {!! Form::close() !!}
</div>


@endsection