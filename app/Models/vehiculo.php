<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;
    protected $table ='vehiculos';
    // relacion
    public function usuarios(){
        //esta funcion se encargar de que cada objeto carga automaticamente todos los datos
        // de uusuario que haya creado en el vehiculo
        return $this->belongsTo('App\User', 'user_id');
    }
}
