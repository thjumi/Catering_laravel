<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table='eventos';

    protected $fillable=['nombre','descripcion','fecha','horario','numInvitados'];

    public function administrador(){
        return $this->belongsTo(Administrador::class);
    }
}
