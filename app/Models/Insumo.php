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

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'insumo_evento')->withPivot('cantidad')->withTimestamps();
    }
    
}
