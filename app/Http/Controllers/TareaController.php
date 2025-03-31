<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TareaService;
use App\Models\User;
use App\Models\Tarea;
use App\Models\Evento;

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

        return view('tareas.index', compact('tareas'));
    }

    // Obtener una tarea específica por ID
    public function show($id)
    {
        $tarea = Tarea::with(['evento', 'empleado'])->findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }
    

    // Mostrar formulario de creación de tarea
    public function create()
    {
        $usuarios = User::where('role', 'empleado')->get(); // Obtener usuarios con rol empleado
        $eventos = Evento::all(); // Obtener todos los eventos disponibles
        return view('tareas.create', compact('usuarios', 'eventos'));
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $usuario = $request->user();

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea' => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id' => 'required|exists:eventos,id', // Validar el evento
        ]);

        $this->tareaService->createTarea($data, $usuario);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito');
    }

    // Mostrar el formulario de edición de una tarea
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $eventos = Evento::all(); // Obtener todos los eventos disponibles
        $empleados = User::where('role', 'empleado')->get(); // Obtener los empleados
        return view('tareas.edit', compact('tarea', 'eventos', 'empleados'));
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea' => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id' => 'required|exists:eventos,id', // Asegurarse de que el evento existe
        ]);

        $tarea = Tarea::findOrFail($id);
        $tarea->update($data);

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada con éxito');
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada con éxito');
    }
}

