<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th >ID</th>
                <th >Mascota</th>
                <th >Cliente</th>
                <th >Raza</th>
                <th >fecha Nacimiento</th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
             <tr>
                <th>{{ $mascota->id }}</th>
                <th title="Ver Datos de la mascota" > 
                    <a href="{{ route('mascotas.show', $mascota->id) }}" class="btn btn-link">
                    <strong style="color:red">{{ $mascota->nombre }}</strong>
                    {{ $mascota->descripcion }} </a>
                 </th>
                <th>
                     <?php  if (is_object($mascota->cliente)){  ?>
                    <a href="{{ route('clientes.show', $mascota->idcliente) }}" class="btn btn-link">
                        {{ $mascota->idcliente }} . {{ $mascota->cliente->nombre }}
                        
                       <?php }else{ echo "<i>no existe cliente</i>"; } ?>
                         
                </th>
                <th>
                    <?php  if (is_object($mascota->raza)){  ?>
                    <a href="{{ route('razas.show', $mascota->idraza) }}" class="btn btn-link">
                        {{ $mascota->idraza }} . 
                       
                            {{ $mascota->raza->nombre }} 
                       <?php }else{ echo "<i>no hay raza</i>"; } ?>
                    </a>
                </th>
                <th><?php
                  $date = date_create($mascota->fechaNacimiento);
                  echo date_format($date, 'd-m-Y');
                  ?>
                </th>                 
              
                <th>
                    @if ($render)
                    <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-link"> Borrar </button>
                    </form>
                    @endif
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@if ($render)
    {!! $mascotas->render() !!}
@endif