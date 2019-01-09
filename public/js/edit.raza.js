var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
    alert('script cargado');
}


function SelectMascotas(){
    $('#selectmascotas').on('change', onSelectAgenda);
}

function onSelectAgenda(){
    var item = $(this).val();
    
}