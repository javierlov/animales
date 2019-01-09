@extends('layouts.app')

@section('content')
@include('razas.fragment.aside')
<div class="col-sm-8">
    <h2>
        {{ $raza->name }}
        <a href="{{ route('razas.edit', $raza->id) }}" class="btn btn-default pull-right">Editar</a>
    </h2>
 
     {!! Form::model($raza, ['route' => ['razas.update', $raza->id], 'method' => 'PUT']) !!}
        @include('razas.fragment.form', ['accion_title'=>'Datos', 'editable'=>'disabled'])
    {!! Form::close() !!}
    
</div>

@endsection
 <script src="{{ asset('js/edit.raza.js') }}"></script>