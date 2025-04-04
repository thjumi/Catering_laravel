<?php

namespace App\Services;

use App\Contracts\InsumoServiceInterface;
use App\Models\Insumo;
use App\Models\Evento;

class InsumoService implements InsumoServiceInterface
{
    // Obtener todos los insumos según el rol del usuario
    public function getAllInsumos($usuario)
    {
        if ($usuario->role === 'administrador' || $usuario->role === 'administrador Stock') {
            return Insumo::all();
        }

        abort(403, 'No tienes permiso para ver los insumos.');
    }

    // Obtener un insumo por ID con verificación de permisos
    public function getInsumoById($id, $usuario)
    {
        $insumo = Insumo::findOrFail($id);

        if ($usuario->role === 'administrador' || $usuario->role === 'administrador Stock') {
            return $insumo;
        }

        abort(403, 'No tienes permiso para ver este insumo.');
    }

    // Crear un nuevo insumo (solo para el administrador de stock)
    public function createInsumo(array $data, $usuario)
    {
        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permiso para crear insumos.');
        }

        return Insumo::create($data);
    }

    // Actualizar un insumo existente (solo para el administrador de stock)
    public function updateInsumo($id, array $data, $usuario)
    {
        $insumo = Insumo::findOrFail($id);

        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permiso para actualizar insumos.');
        }

        $insumo->update($data);
        return $insumo;
    }

    // Eliminar un insumo (solo para el administrador de stock)
    public function deleteInsumo($id, $usuario)
    {
        $insumo = Insumo::findOrFail($id);

        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permiso para eliminar insumos.');
        }

        $insumo->delete();
    }

    // Asignar un insumo a un evento (solo para el administrador de stock)
    public function asignarInsumoAEvento($insumoId, $eventoId, $cantidad, $usuario)
    {
        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permiso para asignar insumos a eventos.');
        }

        // Verificar existencia del insumo y del evento
        $insumo = Insumo::findOrFail($insumoId);
        $evento = Evento::findOrFail($eventoId);

        // Inserta en la tabla pivote la asignación.
        // Nota: Asegúrate de que en el modelo Evento esté definida la relación "insumos".
        $evento->insumos()->attach($insumoId, ['cantidad' => $cantidad]);

        return response()->json(['message' => 'Insumo asignado al evento con éxito']);
    }
}

