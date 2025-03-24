<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table='administradores';
    protected $fillable =['nit','nombre_empresa'];

    public function evento(){
        return $this->hasMany(Evento::class);
    }
}
