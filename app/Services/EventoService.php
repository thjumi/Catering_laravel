<?php

namespace App\Services;


use App\Contracts\EventoServiceInterface;
use App\Models\Evento;

class EventoService implements EventoServiceInterface
{
    // Obtener eventos según el rol del usuario
    public function obtenerEventos($usuario)
    {
        if ($usuario->rol === 'administrador') {
            return Evento::all(); // Los administradores ven todos los eventos
        } elseif ($usuario->rol === 'empleado') {
            return Evento::whereHas('eventoEmpleado', function ($query) use ($usuario) {
                $query->where('empleado_id', $usuario->id);
            })->get(); // Los empleados solo ven sus eventos asignados
        }
        return [];
    }

    // Obtener un evento por ID
    public function obtenerEventoPorId($id)
    {
        return Evento::findOrFail($id);
    }

    // Crear un nuevo evento
    public function crearEvento(array $data)
    {
        return Evento::create($data);
    }

    // Actualizar un evento existente
    public function actualizarEvento($id, array $data)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($data);
        return $evento;
    }

    // Eliminar un evento
    public function eliminarEvento($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
    }
}
