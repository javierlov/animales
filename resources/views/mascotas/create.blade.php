@extends('layouts.app')

@section('content')
<div class="col-sm-8">
    <h2>
        Nueva Mascota
        <a href="{{ route('mascotas.index') }}" class="btn btn-default pull-right">Listado Mascotas</a>
    </h2>
    @include('mascotas.fragment.error')
    
    {!! Form::open(['route' => 'mascotas.store']) !!}    
        @include('mascotas.fragment.form')        
    {!! Form::close() !!}
    
</div>
    <div class="col-sm-4 pull-right">
         @include('mascotas.fragment.aside')
    </div>


@endsection