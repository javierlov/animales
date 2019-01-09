<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'idcliente', 'idraza', 'nombre', 'descripcion', 'fechaNacimiento', 'fechaFallecimiento', 'peso'
    ];
    
    public function cliente()
    {
        return $this->belongsTo('App\Cliente','idcliente');
    }
    
    public function raza()
    {        
        return $this->belongsTo('App\Razas','idraza');
    }
    
    
}
