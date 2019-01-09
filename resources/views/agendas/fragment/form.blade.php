<h3>{{$accion_title}} Item Agenda </h3>
<?php 
$hoy = date("Y-m-d");
// echo $hoy;
?>
<div class="form-group">
    {!! Form::label('descripcion','descripcion') !!}
    {!! Form::textarea('descripcion', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaDesde','fechaDesde') !!}
    {!! Form::date('fechaDesde', null, ['class'=>'w-25 p-3 form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaHasta','fechaHasta') !!}
    {!! Form::date('fechaHasta', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaFinalizacion','fechaFinalizacion') !!}
    {!! Form::date('fechaFinalizacion', null, ['class'=>'form-control',$editable]) !!}
</div>

@if ($accion_title == 'Editar')
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary',$editable]) !!}
</div>
@endif