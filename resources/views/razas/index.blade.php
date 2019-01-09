@extends('layouts.app')

@section('content')
@include('razas.fragment.aside')

<div class="col-sm-9">
    <h2>
        Listado de Razas
    </h2>
    @include('razas.fragment.info')
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
            @foreach($razas as $raza)
             <tr>
                <th>{{ $raza->id }}</th>
                <th> 
                    <a href="{{ route('razas.show', $raza->id) }}" class="btn btn-link">
                        <strong style="color:blue">{{ $raza->nombre }}</strong>
                    </a>
                 </th>
                 <th>
                        {{ $raza->descripcion }}
                 </th>
                <th>
                    <form action="{{ route('razas.destroy', $raza->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link"> Borrar </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $razas->render() !!}
</div>
 

@endsection

