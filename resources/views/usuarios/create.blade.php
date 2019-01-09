@extends('layouts.app')

@section('content')

@include('usuarios.fragment.aside')
<div class="col-sm-9">
    
    @include('usuarios.fragment.error')
    
    {!! Form::open(['route' => 'usuarios.store']) !!}
    
        @include('usuarios.fragment.form',['accion_title'=>'Editar', 'editable'=>'enabled'])
        
    {!! Form::close() !!}
    
</div>


@endsection