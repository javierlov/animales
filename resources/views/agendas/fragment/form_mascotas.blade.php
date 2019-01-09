
<table class="table">
    <tbody>
        
         <tr>
            <th>
            <a href="{{ route('mascotas.show', $mascotaItem->id) }}" class="info"> 
                     {{ $mascotaItem->nombre }}, {{ $mascotaItem->raza->nombre }}   </a>              
            </th>
         </tr>
         <tr>
            <th>
            <a href="{{ route('clientes.show', $mascotaItem->idcliente) }}" class="info"> 
                     {{ $mascotaItem->idcliente }}, {{ $mascotaItem->cliente->nombre }}  
                     {{ count($mascotaItem->cliente->mascotas) }}   </a>  
            </th>
        </tr>
    </tbody>
</table>
