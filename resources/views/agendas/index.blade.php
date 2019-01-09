@extends('layouts.app')

@section('content')
@include('agendas.fragment.aside')

<div class="col-sm-9">
    <h2>Agenda - Mascotas</h2>
    
    @include('agendas.fragment.info')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th >ID. Tareas </th>
                <th >Desde</th>
                <th >Hasta</th>
                <th >Finalizacion</th>
                <th >Mascota - Cliente</th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
             <tr>
                <th> <a href="{{ route('agendas.show', $agenda->id) }}" class="btn btn-link">
                    <strong style="color:red">{{ $agenda->id }}</strong>
                    {{ $agenda->descripcion }} .  </a> 
                 </th>
                <th>{{ $agenda->fechaDesde }}</th>
                <th>{{ $agenda->fechaHasta }}</th>
                <th>{{ $agenda->fechaFinalizacion }}</th>
                <th> <?php  if (count($agenda->mascota)== 0){ 
                        echo "<i style='color:red'> No tiene Mascota </i>";
                    }else{                       
                    } ?>@include('agendas.fragment.form_mascotas',['mascotaItem'=>$agenda->mascota])
                </th>                
                 
                <th>
                    <form action="{{ route('agendas.destroy', $agenda->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link"> Borrar </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $agendas->render() !!}
</div>
   

@endsection