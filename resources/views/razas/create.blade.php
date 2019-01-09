@extends('layouts.app')

@section('content')

@include('razas.fragment.aside')
<div class="col-sm-9">
    
    @include('razas.fragment.error')
    
    {!! Form::open(['route' => 'razas.store']) !!}
    
        @include('razas.fragment.form',['accion_title'=>'Editar', 'editable'=>'enabled'])
        
    {!! Form::close() !!}
    
</div>


@endsection