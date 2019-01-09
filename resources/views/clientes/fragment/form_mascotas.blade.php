
<table class="table table-active">
        @foreach($mascotas as $mascota)
         <tr>
             <a href="{{ route('mascotas.show', $mascota->id) }}" class="info"> 
                    {{ $mascota->nombre }}  </a>              
        </tr>
        @endforeach
</table>
