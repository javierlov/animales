@extends('layouts.app')

@section('content')
@include('usuarios.fragment.aside')
<div class="col-sm-8">   
 
    {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'GET']) !!}
        @include('usuarios.fragment.form', ['accion_title'=>'Datos', 'editable'=>'disabled'])
    {!! Form::close() !!}
    
</div>

@endsection