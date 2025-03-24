<?php

namespace App\Services;

use App\Contracts\TareaServiceInterface;
use App\Models\Tarea;

class TareaService implements TareaServiceInterface
{
    // Obtener las tareas según el rol del usuario
    public function getAllTareas($usuario)
    {
        if ($usuario->rol === 'administrador') {
            return Tarea::all();
        } elseif ($usuario->rol === 'empleado') {
            return Tarea::whereHas('eventoEmpleado', function ($query) use ($usuario) {
                $query->where('empleado_id', $usuario->id);
            })->get();
        }
        return [];
    }

    // Obtener una tarea por ID con verificación de permisos
    public function getTareaById($id, $usuario)
    {
        $tarea = Tarea::findOrFail($id);

        if ($usuario->rol === 'administrador') {
            return $tarea;
        }

        // Verificar si el usuario tiene acceso a esta tarea
        if ($usuario->rol === 'empleado' && $tarea->eventoEmpleado->empleado_id === $usuario->id) {
            return $tarea;
        }

        abort(403, 'No tienes permiso para ver esta tarea.');
    }

    // Crear una nueva tarea (solo para administradores)
    public function createTarea(array $data, $usuario)
    {
        if ($usuario->rol !== 'administrador') {
            abort(403, 'No tienes permiso para crear tareas.');
        }

        return Tarea::create($data);
    }

    // Actualizar una tarea existente con verificación de permisos
    public function updateTarea($id, array $data, $usuario)
    {
        $tarea = Tarea::findOrFail($id);

        if ($usuario->rol !== 'administrador') {
            abort(403, 'No tienes permiso para actualizar tareas.');
        }

        $tarea->update($data);
        return $tarea;
    }

    // Eliminar una tarea con verificación de permisos
    public function deleteTarea($id, $usuario)
    {
        $tarea = Tarea::findOrFail($id);

        if ($usuario->rol !== 'administrador') {
            abort(403, 'No tienes permiso para eliminar tareas.');
        }

        $tarea->delete();
    }
}
