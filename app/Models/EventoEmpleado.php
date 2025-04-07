<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Evento;

class EventoEmpleado extends Model
{
    protected $table = 'evento_empleados';

    protected $fillable = ['evento_id', 'empleado_id', 'rol_empleado'];

    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
