<?php

namespace App\Services;

use App\Contracts\EmpleadoServiceInterface;
use App\Models\Empleado;


class EmpleadoService implements EmpleadoServiceInterface
{
    // Obtener todos los empleados (solo para administradores)
    public function getAllEmpleados($user)
    {
        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para ver empleados.');
        }

        return Empleado::all();
    }

    // Obtener un empleado por ID con verificación de permisos
    public function getEmpleadoById($id, $user)
    {
        $empleado = Empleado::findOrFail($id);

        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para ver este empleado.');
        }

        return $empleado;
    }

    // Crear un nuevo empleado (solo para administradores)
    public function createEmpleado(array $data, $user)
    {
        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para crear un empleado.');
        }

        return Empleado::create($data);
    }

    // Asignar un rol a un empleado (solo para administradores)
  // Asignar un subrol a un empleado (solo para administradores)
public function asignarSubrolEmpleado($id, array $data, $user)
{
    if ($user->rol !== 'administrador') {
        abort(403, 'No tienes permiso para asignar subroles.');
    }

    $empleado = Empleado::findOrFail($id);

    // Verificar que el rol sea "empleado" antes de asignar un subrol
    if ($empleado->rol !== 'empleado') {
        abort(400, 'Solo los empleados pueden tener subrol.');
    }

    $empleado->subrol = $data['subrol'];
    $empleado->save();

    return $empleado;
}


    // Actualizar un empleado existente (solo para administradores)
    public function updateEmpleado($id, array $data, $user)
    {
        $empleado = Empleado::findOrFail($id);

        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para actualizar empleados.');
        }

        $empleado->update($data);
        return $empleado;
    }

    // Eliminar un empleado con verificación de permisos
    public function deleteEmpleado($id, $user)
    {
        $empleado = Empleado::findOrFail($id);

        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para eliminar empleados.');
        }

        $empleado->delete();
    }
}
