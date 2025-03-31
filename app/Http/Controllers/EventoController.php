<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $eventos = Evento::with('empleado')->get(); // Traer eventos con empleado asignado
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $usuarios = User::where('role', 'empleado')->get(); // Obtener usuarios con rol empleado
        return view('eventos.create', compact('usuarios'));
    }
    public function show($id)
    {
        $evento = Evento::with('empleado')->findOrFail($id); // Cargar evento con la relación `empleado`

        return view('eventos.show', compact('evento'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:10|max:40',
            'descripcion' => 'nullable|string|min:10|max:250',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'num_invitados' => 'required|numeric|min:1',
            'usuario_id' => 'required|exists:users,id', // Validar usuario
        ]);

        $data['administrador_id'] = 1; // Asignar administrador por defecto
        $data['empleado_id'] = $data['usuario_id']; // Asignar usuario a empleado_id

        Evento::create($data);

        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id); // Buscar evento o error 404
        $usuarios = User::where('role', 'empleado')->get(); // Obtener empleados disponibles
        return view('eventos.edit', compact('evento', 'usuarios'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:10|max:40',
            'descripcion' => 'nullable|string|min:10|max:250',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'num_invitados' => 'required|numeric|min:1',
            'usuario_id' => 'required|exists:users,id', // Validar usuario
        ]);

        $evento = Evento::findOrFail($id);
        $data['empleado_id'] = $data['usuario_id']; // Asignar usuario a empleado_id

        $evento->update($data);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito');
    }
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id); // Buscar el evento por su ID

        try {
            $evento->delete(); // Eliminar el evento
            return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('eventos.index')->with('error', 'Error al eliminar el evento: ' . $e->getMessage());
        }
    }

}
