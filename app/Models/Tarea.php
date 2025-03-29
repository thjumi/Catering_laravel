<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = ['nombre', 'descripcion', 'fechaTarea', 'empleado_id', 'estado'];

    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }
}
