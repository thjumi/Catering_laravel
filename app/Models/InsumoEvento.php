<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;
use App\Models\Insumo;

class InsumoEvento extends Model
{
    protected $table='insumo_eventos';

    protected $fillable = ['insumo_id','evento_id', 'cantidad'];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    public function insumo(){
        return $this->belongsTo(Insumo::class);
    }
}
