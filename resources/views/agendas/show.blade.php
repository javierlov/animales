@extends('layouts.app')

@section('content') 
@include('agendas.fragment.aside')
@include('agendas.fragment.info')
@include('agendas.fragment.error')

<div class="col-sm-8">
    <div style="font-size: 23px"> Actividad: {{ $agenda->descripcion }} </div> 
    <h4>
        <a href="{{ route('mascotas.show', $agenda->idmascota) }}" >
            Mascota: {{ $agenda->mascota->nombre }}
        </a>
        <br>
        <a href="{{ route('razas.show', $agenda->mascota->idraza) }}" >
           Raza: {{ $agenda->mascota->raza->nombre }} 
        </a>
        <a href="{{ route('agendas.edit', $agenda->id) }}" class="btn btn-primary pull-right">Editar</a>
    </h4>
    {!! Form::model($agenda, ['route' => ['agendas.update', $agenda->id], 'method' => 'PUT']) !!}
        @include('agendas.fragment.form',['accion_title'=>'Datos', 'editable'=>'disabled'])
    {!! Form::close() !!}
    
    
</div>

@endsection