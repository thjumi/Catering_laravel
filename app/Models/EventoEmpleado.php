<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoEmpleado extends Model
{
    protected $table= 'evento_empleado';

    protected $filleable=['evento_id','empleado_id', 'rol_empleado'];

    public function empleado(){
        return $this->belongsTo('Empleado::class');
    }

    public function evento(){
        return $this->belongsTo('Evento::class');
    }
}
