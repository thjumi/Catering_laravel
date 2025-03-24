<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table= 'insumos';

    protected $filleable=['nombre','tipo_insumo','cantidad','descripcion','lugar_almacen','estado'];

    public function insumoEvento(){
        return $this->hasMany('InsumoEvento::class');
    }

}
