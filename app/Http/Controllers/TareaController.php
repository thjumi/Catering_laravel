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
    
        // Filtros recibidos desde la vista
        $estado = $request->input('estado');
        $empleadoId = $request->input('empleado_id');
        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');
        $eventoId = $request->input('evento_id');
    
        // Obtener todas las tareas según el rol del usuario
        $tareas = $this->tareaService->getAllTareas($usuario);
    
        // Aplicar filtros si existen
        if ($estado) {
            $tareas = $tareas->filter(function ($tarea) use ($estado) {
                return $tarea->estado === $estado;
            });
        }
    
        if ($empleadoId) {
            $tareas = $tareas->filter(function ($tarea) use ($empleadoId) {
                return $tarea->empleado_id == $empleadoId;
            });
        }
    
        if ($eventoId) {
            $tareas = $tareas->filter(function ($tarea) use ($eventoId) {
                return $tarea->evento_id == $eventoId;
            });
        }
    
        if ($request->filled('fecha')) {
            $tareas = $tareas->filter(function ($tarea) use ($request) {
                return \Carbon\Carbon::parse($tarea->fechaTarea)->toDateString() === $request->fecha;
            });
        }
    
        // Listado de empleados y eventos para el formulario de filtros
        $empleados = User::where('role', 'empleado')->get();
        $eventos = Evento::all();
    
        // Retornar la vista con las tareas filtradas
        return view('tareas.index', compact('tareas', 'empleados', 'eventos'));
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
            'nombre'      => 'required|string|min:5|max:255',
            'descripcion' => 'nullable|string|min:10|max:255',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id'   => 'nullable|exists:eventos,id',
            'estado'      => 'required|in:Pendiente,En Proceso,Completada',
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
            'evento_id'   => 'nullable|exists:eventos,id',
            'estado'      => 'required|in:Pendiente,En Proceso,Completada',
        ]);

        $tarea = Tarea::findOrFail($id);
        $tarea->update([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fechaTarea' => $data['fechaTarea'],
            'empleado_id' => $data['empleado_id'],
            'estado' => $data['estado'],
            'evento_id' => $data['evento_id'],
             ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada con éxito');
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada con éxito');
        if ($tarea) {
            $tarea->delete();
            return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
        }

        return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
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



public function filtrarTareas(Request $request)
{
    $user = $request->user();

    $query = Tarea::with('evento')
        ->where('empleado_id', $user->id);

    if ($request->filled('fecha')) {
        $query->whereDate('fechaTarea', $request->fecha);
    }

    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    if ($request->filled('evento')) {
        $query->whereHas('evento', function ($q) use ($request) {
            $q->where('nombre', 'like', '%' . $request->evento . '%');
        });
    }

    return response()->json(['data' => $query->get()]);
}

}
