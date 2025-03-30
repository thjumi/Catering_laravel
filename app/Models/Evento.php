<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'horario', 'num_invitados', 'administrador_id'];

    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }

    // Relación de muchos a muchos para asignar empleados al evento.
    // Asegúrate de tener la tabla pivote "evento_empleado" con las columnas "evento_id" y "empleado_id".
    public function empleados()
    {
        return $this->belongsToMany(User::class, 'evento_empleado', 'evento_id', 'empleado_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}

