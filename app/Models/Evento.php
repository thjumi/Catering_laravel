<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table='eventos';

    protected $fillable=['nombre','descripcion','fecha','horario','num_invitados', 'administrador_id'];

    public function administrador(){
        return $this->belongsTo(Administrador::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
