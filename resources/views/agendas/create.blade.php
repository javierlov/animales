@extends('layouts.app')

@section('content')
         @include('agendas.fragment.aside')
<div class="col-sm-8">
  
    @include('agendas.fragment.error')
    
    {!! Form::open(['route' => 'agendas.store']) !!}
    
        @include('agendas.fragment.form',['accion_title'=>'Editar', 'editable'=>'enabled'])
        
    {!! Form::close() !!}
    
</div>

@endsection