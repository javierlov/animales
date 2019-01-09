
 <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th >ID</th>
                <th width='10%'>Cliente</th>
                <th >Direccion</th>
                <th >email</th>
                <th >Mascotas</th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
             <tr>
                <th>{{ $cliente->id }}</th>
                <th> 
                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-link">
                        <strong style="color:blue">{{ $cliente->nombre }}</strong>
                    </a>
                 </th>
                <th>{{ $cliente->direccion }}</th>
                <th>{{ $cliente->email }}</th>
                <th>
                    <?php  if ( count($cliente->mascotas) == 0 ){ 
                        echo "<i style='color:red'> No tiene Mascota </i>";
                    }else{ ?>
                        @include('clientes.fragment.form_mascotas', 
                        ['mascotas'=>$cliente->mascotas, 'editable'=>'enabled']); 
                     <?php   } ?>
                </th>
                
                <th>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link"> Borrar </button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $clientes->render() !!}