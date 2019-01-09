<h3>{{$accion_title}} Producto </h3>

<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('short','Descripcion breve') !!}
    {!! Form::text('short', null, ['class'=>'form-control',$editable]) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Descripcion del producto') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control',$editable]) !!}
</div>

@if ($accion_title != 'Ver')
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
</div>
@endif