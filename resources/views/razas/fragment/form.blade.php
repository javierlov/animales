<h3>{{$accion_title}} Raza </h3>

<div class="form-group">
    {!! Form::label('nombre','Nombre de la Raza') !!}
    {!! Form::text('nombre', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion','Descripcion  de la Raza') !!}
    {!! Form::text('descripcion', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('idusuario','Usuario') !!}
    {!! Form::text('idusuario',  Auth::user()->id , ['class'=>'form-control', 'readonly']) !!}
</div>

    @if ($accion_title == 'Editar')
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary',$editable]) !!}
</div>
    @endif