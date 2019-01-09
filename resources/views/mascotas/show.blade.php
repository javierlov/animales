@extends('layouts.app')

@section('content')
@include('mascotas.fragment.aside')
    <div class="col-sm-9">
        <h2> 
            Mascota: {{ $mascota->nombre }}, 
        </h2>
        <h3> <a href="{{ route('razas.show', $mascota->idraza) }}" >
                Raza :{{ $mascota->raza->nombre }} </a>
        </h3>
        <h4>
            <a href="{{ route('clientes.show', $mascota->idcliente) }}" >
                Cliente: {{ $mascota->cliente->nombre }}
            </a>
        </h4>
            <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-primary pull-right">Editar</a>

       {!! Form::model($mascota, ['route' => ['mascotas.update', $mascota->id], 'method' => 'PUT']) !!}
            @include('mascotas.fragment.form', ['accion_title'=>'Datos', 'editable'=>'disabled'])
        {!! Form::close() !!}
    </div>

@endsection