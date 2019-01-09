<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charlas extends Model
{
     protected $fillable = [
        'title', 'premium'
    ];
     
    public function isPremium(){
        return $this->premium;
    }
    
    public function archive(){
        echo "<p>la charla {$this->title} fue archivada </p>";
    }
    
   
}
