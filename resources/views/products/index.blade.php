@extends('layouts.app')

@section('content')
@include('products.fragment.aside')

<div class="col-sm-9">
    @include('products.fragment.info')
    @include('error')
    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>short</th>
                <th>body</th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
             <tr>
                <th>{{ $product->id }}</th>
                <th style="width:45 px;" > 
                    <a href="{{ route('products.show', $product->id) }}" class="links">
                        {{ $product->name }} 
                    </a>
                </th>
                <th> {{ $product->short }} </th>                
                <th> {{ $product->body }} </th>                
                <th>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link"> Borrar </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->render() !!}
</div>

@endsection