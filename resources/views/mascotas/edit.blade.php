@extends('layouts.app')

@section('content')
 @include('mascotas.fragment.aside')
<div class="col-sm-9">
    @include('mascotas.fragment.error')
    
    {!! Form::model($mascota, ['route' => ['mascotas.update', $mascota->id], 'method' => 'PUT']) !!}
        @include('mascotas.fragment.form', ['accion_title'=>'Editar', 'editable'=>'enabled'])
    {!! Form::close() !!}
</div>
    
@endsection
     