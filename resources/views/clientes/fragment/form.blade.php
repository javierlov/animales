<h3>{{$accion_title}} Cliente  </h3>

<div class="form-group">
    {!! Form::label('nombre','Nombre de cliente') !!}
    {!! Form::text('nombre', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion','Direccion') !!}
    {!! Form::text('direccion', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion','Descripcion') !!}
    {!! Form::text('descripcion', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email') !!}
    {!! Form::text('email', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('sexo','Sexo') !!}
    {!! Form::select('sexo', ['masculino' => 'masculino', 'femenino' => 'femenino', 'indefinido' => 'indefinido'], 
                                    $cliente->sexo, 
                                    ['class'=>'form-control',$editable]) !!}
</div>

@if ($accion_title != 'Ver')
<div class="form-group">
    {!! Form::submit('ENVIAR', ['class'=>'btn btn-primary',$editable]) !!}
</div>
@endif