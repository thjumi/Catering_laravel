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

    // Obtener todas las tareas según el rol del usuario (vista del Administrador)
    public function index(Request $request)
    {
        $usuario = $request->user();
        $estado = $request->input('estado'); // Obtener el estado del filtro
        
        // Se asume que getAllTareas retorna una colección
        $tareas = $this->tareaService->getAllTareas($usuario);
        
        if ($estado) {
            $tareas = $tareas->filter(function ($tarea) use ($estado) {
                return $tarea->estado === $estado;
            });
        }
    
        return view('tareas.index', ['tareas' => $tareas]);
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
        $usuarios = User::where('role', 'empleado')->get();
        $eventos = Evento::all();
        return view('tareas.create', compact('usuarios', 'eventos'));
    }
    
    // Crear una nueva tarea
    public function store(Request $request)
    {
        $usuario = $request->user();

        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id'   => 'required|exists:eventos,id',
        ]);

        $this->tareaService->createTarea($data, $usuario);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito');
    }
    
    // Mostrar formulario de edición de una tarea
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $eventos = Evento::all();
        $empleados = User::where('role', 'empleado')->get();
        return view('tareas.edit', compact('tarea', 'eventos', 'empleados'));
    }
    
    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id'   => 'required|exists:eventos,id',
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
    
    // Actualizar el estado de una tarea (solo para Administrador)
    public function actualizarEstado(Request $request, $id)
    {
        if (!$request->user()->hasRole('Administrador')) {
            abort(403, 'No tienes permiso para cambiar el estado de las tareas.');
        }

        $tarea = Tarea::findOrFail($id);

        $request->validate([
            'estado' => 'required|in:Pendiente,En Proceso,Completada',
        ]);

        $tarea->estado = $request->estado;
        $tarea->save();

        return redirect()->back()->with('success', 'Estado de la tarea actualizado correctamente.');
    }
}
