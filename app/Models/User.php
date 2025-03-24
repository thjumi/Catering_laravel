<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Para diferenciar entre admin, empleado, etc.
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relación con el modelo Administrador.
     */
    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    /**
     * Verifica si el usuario tiene el rol especificado.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
