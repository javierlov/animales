<h3>{{$accion_title}}  usuario </h3>

<div class="form-group">
    {!! Form::label('nombre','Nombre ') !!}
    {!! Form::text('name', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion','Email') !!}
    {!! Form::text('email', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('createdat','Creado') !!}
    {!! Form::text('created_at',  null , ['class'=>'form-control', $editable]) !!}
</div>

    @if ($accion_title == 'Editar')
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary',$editable]) !!}
</div>
    @endif