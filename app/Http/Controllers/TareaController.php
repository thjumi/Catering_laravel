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

    // Listado de tareas (Índice)
    public function index(Request $request)
    {
        // Se espera que el servicio retorne una colección de tareas
        $tareas = $this->tareaService->getAllTareas($request->user());
        return view('tareas.index', ['tareas' => $tareas]);
    }

    // Mostrar detalles de una tarea
    public function show($id)
    {
        $tarea = Tarea::with(['evento', 'empleado'])->findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }

    // Formulario para crear una tarea
    public function create()
    {
        // Se asume que los usuarios con rol "empleado" se obtienen de esta forma
        $usuarios = User::where('role', 'empleado')->get();
        $eventos = Evento::all();
        return view('tareas.create', compact('usuarios', 'eventos'));
    }

    // Guardar tarea nueva
    public function store(Request $request)
    {
        $usuario = $request->user();

        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id'   => 'required|exists:eventos,id',
            'estado'      => 'required|in:Pendiente,En Proceso,Completada',
        ]);

        $this->tareaService->createTarea($data, $usuario);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito');
    }

    // Formulario para editar una tarea
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $eventos = Evento::all();
        $empleados = User::where('role', 'empleado')->get();
        return view('tareas.edit', compact('tarea', 'eventos', 'empleados'));
    }

    // Actualizar tarea existente
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fechaTarea'  => 'required|date',
            'empleado_id' => 'required|exists:users,id',
            'evento_id'   => 'required|exists:eventos,id',
            'estado'      => 'required|in:Pendiente,En Proceso,Completada',
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
