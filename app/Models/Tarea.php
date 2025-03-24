<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table= 'tarea';

    protected $filleable=['nombre','descripcion','fechaTarea','empleado_id'];

    public function empleado(){
        return $this->belongsTo('Empleado::class');
    }
}
