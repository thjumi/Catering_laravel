<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Insumo;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Función para mostrar las tareas asignadas a un empleado
    public function empleado()
    {
        $tareasAsignadas = Tarea::with('evento')->where('empleado_id', Auth::id())->paginate(10);
        return view('dashboard.empleado', compact('tareasAsignadas'));
    }

    public function stock(Request $request)
    {
        $usuario = $request->user();
        $rolUsuario = strtolower(trim($usuario->role));

        if ($rolUsuario !== 'administrador' && $rolUsuario !== 'administrador stock') {
            abort(403, 'No tienes permiso para ver los insumos.');
        }

        $query = Insumo::all();

        // Filtro por nombre
        if ($request->filled('nombre')) {
            $query = Insumo::where('nombre', 'LIKE', '%' .  $request->nombre . '%')->get();
        }

        // Filtro por cantidad mínima
        if ($request->filled('cantidad_minima')) {
            $query = $query->where('cantidad', '>=', $request->cantidad_minima);
        }

        $insumos = $query;

        return view('dashboard.stock', compact('insumos'));
    }

    public function admin()
    {
        $eventos = Evento::all();
        $totalTareas = Tarea::count();
        $totalEventos = Evento::count();
        $totalEmpleados = User::where('role', 'empleado')->count();
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count();
        $totalInsumos = Insumo::count();

        // Actividad reciente
        $ultimaTarea = Tarea::latest()->first();
        $ultimoEvento = Evento::latest()->first();
        $ultimoEmpleado = User::where('role', 'empleado')->latest()->first();

        $actividadReciente = [];

        if ($ultimaTarea) {
            $actividadReciente[] = '✅ Tarea "' . $ultimaTarea->nombre . '" creada';
        }

        if ($ultimoEvento) {
            $actividadReciente[] = '📅 Evento "' . $ultimoEvento->nombre . '" añadido';
        }

        if ($ultimoEmpleado) {
            $actividadReciente[] = '➕ Empleado "' . $ultimoEmpleado->name . '" agregado';
        }

        $proximosEventos = Evento::where('fecha', '>=', now())
            ->whereNotNull('nombre')
            ->whereNotNull('fecha')
            ->orderBy('fecha')
            ->take(3)
            ->get();


        $notificaciones = [
            '📌 Recuerda asignar tareas para el evento del viernes.',
            '📌 Asignar a Sebastian al evento del 20/06/25'
        ];


        $empleadoDelMes = User::where('role', 'empleado')->inRandomOrder()->first();

        return view('dashboard.admin', compact(
            'eventos',
            'totalTareas',
            'totalEventos',
            'totalEmpleados',
            'tareasPendientes',
            'totalInsumos',
            'actividadReciente',
            'proximosEventos',
            'notificaciones',
            'empleadoDelMes'
        ));
    }
}
