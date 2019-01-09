@extends('layouts.app')

@section('content')
@include('usuarios.fragment.aside')

<div class="col-sm-9">
    <h2>
        Listado de Usuarios
    </h2>
    @include('usuarios.fragment.info')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th >ID</th>
                <th >Nombre </th>
                <th >Descripcion</th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
             <tr>
                <th>{{ $usuario->id }}</th>
                <th> 
                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-link">
                        <strong style="color:blue">{{ $usuario->name }}</strong>
                    </a>
                 </th>
                 <th>
                        {{ $usuario->email }} , {{ $usuario->created_at }} 
                 </th>
                <th>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link" disabled="disabled" > Borrar </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $usuarios->render() !!}
</div>
 

@endsection