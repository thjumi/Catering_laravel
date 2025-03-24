<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    // Listar eventos según el rol
    public function index()
    {
        $user = Auth::user();

        if ($user->rol === 'administrador') {
            $eventos = Evento::all(); // Admin ve todos los eventos
        } elseif ($user->rol === 'empleado') {
            $eventos = Evento::whereHas('eventoEmpleado', function ($query) use ($user) {
                $query->where('empleado_id', $user->id);
            })->get(); // Empleado ve solo los eventos asignados
        } else {
            return response()->json(['message' => 'Acceso no autorizado'], 403);
        }

        return response()->json($eventos);
    }

    // Crear un evento (solo admin)
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->rol !== 'administrador') {
            return response()->json(['message' => 'Acceso no autorizado'], 403);
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'num_invitados' => 'required|integer',
        ]);

        $evento = Evento::create($data);

        return response()->json($evento, 201);
    }

    // Mostrar un evento específico
    public function show($id)
    {
        $user = Auth::user();
        $evento = Evento::findOrFail($id);

        // Validar acceso según rol
        if ($user->rol === 'administrador') {
            return response()->json($evento); // Admin puede ver cualquier evento
        } elseif ($user->rol === 'empleado') {
            // Empleado solo puede ver eventos asignados
            $asignado = $evento->eventoEmpleado->contains('empleado_id', $user->id);
            if ($asignado) {
                return response()->json($evento);
            }
        }

        return response()->json(['message' => 'Acceso no autorizado'], 403);
    }

    // Actualizar un evento (solo admin)
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->rol !== 'administrador') {
            return response()->json(['message' => 'Acceso no autorizado'], 403);
        }

        $data = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'fecha' => 'date',
            'num_invitados' => 'integer',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update($data);

        return response()->json($evento);
    }

    // Eliminar un evento (solo admin)
    public function destroy($id)
    {
        $user = Auth::user();

        if ($user->rol !== 'administrador') {
            return response()->json(['message' => 'Acceso no autorizado'], 403);
        }

        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->json(['message' => 'Evento eliminado con éxito']);
    }
}

