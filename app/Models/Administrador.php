<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table='administradores';
    protected $fillable =['user_id','nit','nombre_empresa'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function evento(){
        return $this->hasMany(Evento::class);
    }
}
