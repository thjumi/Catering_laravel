<?php

namespace App\Services;

use App\Contracts\EventoServiceInterface;
use App\Models\Evento;

class EventoService implements EventoServiceInterface
{
    // Obtener eventos según el rol del usuario
    public function getAllEventos($user)
    {
        if ($user->role === 'administrador') {
            return Evento::all(); // Los administradores ven todos los eventos
        } elseif ($user->role === 'empleado') {
            // Se usa la relación 'empleados' definida en el modelo Evento
            return Evento::whereHas('empleados', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })->get(); // Los empleados ven solo los eventos a los que están asignados
        } elseif ($user->role === 'administrador_stock') {
            return Evento::all(); // El administrador de stock ve todos los eventos para verificar existencia
        }
        return [];
    }

    // Obtener un evento por ID
    public function getEventoById($id)
    {
        return Evento::findOrFail($id);
    }

    // Crear un nuevo evento
    public function createEvento(array $data)
    {
        return Evento::create($data);
    }

    // Actualizar un evento existente
    public function updateEvento($id, array $data)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($data);
        return $evento;
    }

    // Eliminar un evento
    public function deleteEvento($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
    }
}

