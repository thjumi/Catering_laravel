<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    
    protected $table='empleados';
    protected $fillable =['horario'];

    public function tarea(){
        return $this->hasMany(Tarea::class);
    }
}
