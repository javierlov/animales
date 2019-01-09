@extends('layouts.app')

@section('content')
@include('clientes.fragment.aside')

<div class="col-sm-8">
    <h2>
        Cliente: {{ $cliente->nombre }}
        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-danger pull-right">Editar</a>
    </h2>
        {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'PUT']) !!}
        @include('clientes.fragment.form', ['accion_title'=>'Ver', 'editable'=>'disabled'])
        {!! Form::close() !!}
     
        <?php  if ( count($cliente->mascotas) == 0 ){ 
                    echo "<i style='color:red'> No tiene Mascota </i>";
                }else{ 
                    echo "<h2>Mascotas </h2>";
                     ?>
            @include('mascotas.fragment.lista', ['mascotas'=>$cliente->mascotas,'render'=>false]); 
        <?php   } ?>
                       
</div>

@endsection