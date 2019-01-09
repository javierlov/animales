@extends('layouts.app')

@section('content')
         @include('clientes.fragment.aside')
<div class="col-sm-8">
    <h2>
        Nuevo cliente       
    </h2>
    @include('clientes.fragment.error')
    
    {!! Form::open(['route' => 'clientes.store']) !!}    
        @include('clientes.fragment.form', ['accion_title'=>'Nuevo', 'editable'=>'enabled'])        
    {!! Form::close() !!}
    
</div>

@endsection