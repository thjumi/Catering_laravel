<?php

namespace App\Services;

use App\Contracts\EmpleadoServiceInterface;
use App\Models\User; // Ahora usamos el modelo User
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class EmpleadoService implements EmpleadoServiceInterface
{
    // Obtener todos los empleados (solo para administradores)

    public function getAllEmpleados($user)
    {
        if (strtolower($user->role) !== 'administrador') {
            abort(403, 'No tienes permiso para ver empleados.');
        }
    
        $query = User::query()->where('role', 'empleado');
    
        // 🔍 Filtro por nombre
        if (request()->filled('nombre')) {
            $query->where('name', 'like', '%' . request('nombre') . '%');
        }
    
        // 🔍 Filtro por subrol (chef, mesero, decorador)
        if (request()->filled('subrol')) {
            $query->where('subrole', request('subrol'));
        }
    
        // 🔍 Filtro por email
        if (request()->filled('email')) {
            $query->where('email', 'like', '%' . request('email') . '%');
        }
    
        // Puedes añadir más filtros aquí si lo necesitas
    
        // Paginación con parámetros de filtro
        return $query->orderBy('name')->paginate(10)->appends(request()->query());
    }



    // Obtener un empleado por ID con verificación de permisos
    public function getEmpleadoById($id, $user)
    {
        $empleado = User::findOrFail($id);

        if ($user->role !== 'administrador') {
            abort(403, 'No tienes permiso para ver este empleado.');
        }

        if ($empleado->role !== 'empleado') {
            abort(404, 'Empleado no encontrado.');
        }

        return $empleado;
    }

    // Crear un nuevo empleado (solo para administradores)
    public function createEmpleado(array $data, $user)
    {
        if ($user->role !== 'administrador') {
            abort(403, 'No tienes permiso para crear un empleado.');
        }

        // Asegúrate de que el campo 'role' se guarde correctamente en la tabla users
        $usernew = User::create(
        [
            'name' => $data['nombre'],
            'email' => $data['email'],
            'password' =>bcrypt($data['nombre'] ),
            'role' => $data['rol'],
            'subrole' => $data['subrol'], // Asignar el subrol
        ]);

        event(new Registered($usernew));

        return $usernew;
    }

    // Asignar un subrol a un empleado (solo para administradores)
    public function asignarSubrolEmpleado($id, array $data, $user)
    {
        if ($user->role !== 'administrador') {
            abort(403, 'No tienes permiso para asignar subroles.');
        }

        $empleado = User::findOrFail($id);

        // Verificar que el rol sea "empleado" antes de asignar un subrol
        if ($empleado->role !== 'empleado') {
            abort(400, 'Solo los empleados pueden tener subrol.');
        }

        $empleado->subrol = $data['subrol'];
        $empleado->save();

        return $empleado;
    }

    // Actualizar un empleado existente (solo para administradores)
    public function updateEmpleado($id, array $data, $user)
    {
        $empleado = User::findOrFail($id);

        if ($user->role !== 'administrador') {
            abort(403, 'No tienes permiso para actualizar empleados.');
        }

        $empleado->update([
            'name' => $data['nombre'],
            'email' => $data['email'],
            'role' => $data['rol'],
            'subrole' => $data['subrol'],
        ]);
        return $empleado;
    }

    // Eliminar un empleado con verificación de permisos
    public function deleteEmpleado($id, $user)
    {
        $empleado = User::findOrFail($id);

        if ($user->role !== 'administrador') {
            abort(403, 'No tienes permiso para eliminar empleados.');
        }

        $empleado->delete();
    }
}

