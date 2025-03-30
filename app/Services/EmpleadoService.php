<?php

namespace App\Services;

use App\Contracts\EmpleadoServiceInterface;
use App\Models\User; // Ahora usamos el modelo User

class EmpleadoService implements EmpleadoServiceInterface
{
    // Obtener todos los empleados (solo para administradores)

        public function getAllEmpleados($user)
        {
            if (strtolower($user->role) !== 'administrador') {
                abort(403, 'No tienes permiso para ver empleados.');
            }
        
            return User::where('role', 'Empleado')->get(); // O normaliza también esta comparación si es necesario
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
        return User::create($data);
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

        $empleado->update($data);
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

