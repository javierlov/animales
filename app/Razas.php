<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Razas extends Model
{
    protected $fillable = [
        'id','nombre', 'descripcion', 'idusuario',
    ];
    
    public function mascotas(){
        return $this->hasMany('App\Mascota','idraza');
    }
}
