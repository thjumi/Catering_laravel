<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsumoEvento extends Model
{
    protected $table='insumoEvento';

    protected $fillable = ['insumo_id','evento_id'];

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    public function insumo(){
        return $this->belongsTo(Insumo::class);
    }
}
