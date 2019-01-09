@extends('layouts.app')

@section('content')
@include('clientes.fragment.aside')

<div class="col-sm-9">
    <h2>
        Clientes
    </h2>
    @include('clientes.fragment.info')
    @include('clientes.fragment.tabla')
   
</div>


@endsection