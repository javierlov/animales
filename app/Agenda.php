<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'idmascota', 'idraza', 'nombre', 'descripcion', 'fechaNacimiento', 'fechaFallecimiento', 'peso'
    ];
    
     public function mascota()
    {        
        return $this->belongsTo('App\Mascota','idmascota');
    }
    
}
