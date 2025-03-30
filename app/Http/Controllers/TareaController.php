<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TareaService;

class TareaController extends Controller
{
    protected $tareaService;

    public function __construct(TareaService $tareaService)
    {
        $this->tareaService = $tareaService;
    }

    // Obtener todas las tareas según el rol del usuario
    public function index(Request $request)
    {
        $usuario = $request->user();
        $tareas = $this->tareaService->getAllTareas($usuario);

        return response()->json($tareas);
    }

    // Obtener una tarea específica por ID
    public function show($id, Request $request)
    {
        $usuario = $request->user();
        $tarea = $this->tareaService->getTareaById($id, $usuario);

        return response()->json($tarea);
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $usuario = $request->user();
        
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'nullable|exists:users,id'
        ]);
    
        $this->tareaService->createTarea($data, $usuario);
    
        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito');
    }
    


    // Actualizar una tarea existente
    public function update($id, Request $request)
    {
        $usuario = $request->user();
        $data = $request->validate([
            'nombre'      => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'sometimes|required|date',
        ]);

        $tarea = $this->tareaService->updateTarea($id, $data, $usuario);

        return response()->json($tarea);
    }

    // Eliminar una tarea
    public function destroy($id, Request $request)
    {
        $usuario = $request->user();

        $this->tareaService->deleteTarea($id, $usuario);

        return response()->json(['message' => 'Tarea eliminada con éxito']);
    }
}
