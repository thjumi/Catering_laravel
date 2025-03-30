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
        $user = $request->user();
        $eventos = $this->eventoService->getAllEventos($user);
        return view('eventos.index', compact('eventos'));
    }

    // Obtener un evento específico por ID
    public function show($id)
    {
        $evento = $this->eventoService->getEventoById($id);

        return response()->json($evento);
    }

    // Crear un nuevo evento
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'         => 'required|string|min:10|max:40',
            'descripcion'    => 'nullable|string|min:30|max:250',
            'fecha'          => 'required|date',
            'horario'        => 'required|date_format:H:i',
            'num_invitados'  => 'required|numeric|min:1',
            // Si se requiere asignar un administrador, puedes agregar 'administrador_id'
        ]);

        $evento = $this->eventoService->createEvento($data);

        return response()->json($evento, 201);
    }

    // Actualizar un evento existente
    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nombre'         => 'required|string|min:10|max:40',
            'descripcion'    => 'nullable|string|min:30|max:250',
            'fecha'          => 'required|date',
            'horario'        => 'required|date_format:H:i',
            'num_invitados'  => 'required|numeric|min:1',
        ]);

        $evento = $this->eventoService->updateEvento($id, $data);

        return response()->json([
            'message' => 'Evento actualizado con éxito',
            'data'    => $evento,
        ]);
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $this->eventoService->deleteEvento($id);

        return response()->json(['message' => 'Evento eliminado con éxito']);
    }
}
