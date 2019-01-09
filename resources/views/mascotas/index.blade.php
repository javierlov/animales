@extends('layouts.app')
@section('content')
@include('mascotas.fragment.aside')

<div class="col-sm-9">
    <h2>
        Mascotas    
           
    </h2>
    @include('mascotas.fragment.info')    
    @include('mascotas.fragment.lista',['mascotas'=>$mascotas,'render'=>true])
    
</div>
    
@endsection