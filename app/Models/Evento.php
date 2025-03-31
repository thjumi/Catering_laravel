<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'horario',
        'num_invitados',
        'administrador_id',
        'empleado_id'
    ];

    // Relación con Administrador
    public function administrador()
    {
        return $this->belongsTo(User::class, 'administrador_id');
    }

    // Relación con un único empleado asignado
    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id'); // Relación con la tabla users
    }
}
