<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se asignan de forma masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',     // Agregado si se requiere asignación masiva
        'subrole',  // Agregado si se requiere asignación masiva
    ];

    /**
     * Los atributos que no se asignan de forma masiva.
     *
     * @var array<int, string>
     */
    // Si deseas evitar la asignación masiva de role y subrole, puedes usar guarded:
    // protected $guarded = ['role', 'subrole'];
    // De lo contrario, puedes dejarlo vacío:
    // protected $guarded = [];

    /**
     * Los atributos que se deben ocultar para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }
  
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
