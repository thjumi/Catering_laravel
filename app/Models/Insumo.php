<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'nombre',
        'tipoInsumo',
        'cantidad',
        'descripcion',
        'lugarAlmacen',
        'disponibilidad',
        'stock'
    ];

    public function insumoEvento()
    {
        // Asegúrate de que el modelo InsumoEvento esté correctamente definido.
        return $this->hasMany(\App\Models\InsumoEvento::class);
    }
}
