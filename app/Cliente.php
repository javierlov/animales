<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id', 'nombre', 'direccion', 'email', 'descripcion', 'sexo'
    ];
    
    public function mascotas()
    {        
        return $this->hasMany('App\Mascota','idcliente');
    }
}
