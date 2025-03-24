<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table= 'insumos';

    protected $filleable=['nombre','tipoInsumo','cantidad','descripcion','lugarAlmacen','estado', 'stock'];

    public function insumoEvento(){
        return $this->hasMany('InsumoEvento::class');
    }

}
