 <?php
 $listaRazas = \DB::table("razas")->pluck("nombre","id")->all();  
 ?>
<h3>{{$accion_title}} Mascota  </h3>

<div class="form-group">
    {!! Form::label('idcliente','idcliente') !!}
    {!! Form::text('idcliente', null, ['class'=>'form-control','readonly']) !!}
</div>

<div class="form-group">
    {!! Form::label('nombre','nombre') !!}
    {!! Form::text('nombre', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion','descripcion') !!}
    {!! Form::text('descripcion', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('idraza','idraza') !!}
    {!! Form::select('idraza', $listaRazas, $mascota->idraza, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaNacimiento','fechaNacimiento') !!}
    {!! Form::date('fechaNacimiento', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaFallecimiento','fechaFallecimiento') !!}
    {!! Form::date('fechaFallecimiento', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('peso','peso') !!}
    {!! Form::text('peso', null, ['class'=>'form-control',$editable]) !!}
</div>

    @if($editable != 'Ver')
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
</div>
    @endif