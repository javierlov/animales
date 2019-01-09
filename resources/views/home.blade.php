@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel principal</div>
                @include('error') 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                           status: {{ session('status') }}
                        </div>
                    @endif

                    Estas logeado
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>


@endsection


