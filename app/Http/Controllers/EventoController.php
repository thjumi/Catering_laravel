<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventoService;

class EventoController extends Controller
{
    protected $eventoService;

    public function __construct(EventoService $eventoService)
    {
        $this->eventoService = $eventoService;
    }

    // Obtener todos los eventos según el rol del usuario
    public function index(Request $request)
    {
        $usuario = $request->user();
        $eventos = $this->eventoService->getAllEventos($usuario);

        return response()->json($eventos);
    }

    // Obtener un evento específico por ID
    public function show($id)
    {
        $evento = $this->eventoService->getEventoByid($id);

        return response()->json($evento);
    }

    // Crear un nuevo evento
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $evento = $this->eventoService->createEvento($data);

        return response()->json($evento, 201); // 201 Created
    }

    // Actualizar un evento existente
    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date|after_or_equal:fecha_inicio',
        ]);

        $evento = $this->eventoService->updateEvento($id, $data);

        return response()->json([
            'message' => 'Evento actualizado con éxito',
            'data' => $evento,
        ]);
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $this->eventoService->deleteEvento($id);

        return response()->json(['message' => 'Evento eliminado con éxito']);
    }
}
