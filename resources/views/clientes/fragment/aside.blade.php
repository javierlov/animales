
<div class="col-sm-2 pull-left">
    <p class="alert alert-info">
        Desde aqui podemos crear, eliminar, listar y editar las clientes..
    </p>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <a href="{{ route('clientes.create') }}" class="btn btn-lg btn-block btn-primary" >Nuevo</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-lg btn-block btn-primary">Listado</a> 
        </div>
    </div>
</div>