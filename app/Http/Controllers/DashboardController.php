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

    // Obtener tareas según la fecha


    // Función para mostrar el stock de insumos
    public function stock()
    {
        $insumos = Insumo::all();  // Obtener todos los insumos
        $eventos = Evento::all();  // Obtener todos los eventos

        return view('dashboard.stock', compact('insumos', 'eventos'));
    }

    // Función para el dashboard de administrador
    public function admin()
    {
        $eventos = Evento::all();
        $totalTareas = Tarea::count();
        $totalEventos = Evento::count();
        $totalEmpleados = User::where('role', 'empleado')->count();
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count();
        $totalInsumos = Insumo::count();
    
        $actividadReciente = [
            optional(Tarea::latest()->first()) ? '✅ Tarea "' . Tarea::latest()->first()->nombre . '" completada' : null,
            optional(Evento::latest()->first()) ? '📅 Evento "' . Evento::latest()->first()->nombre . '" añadido' : null,
            optional(User::where('role', 'empleado')->latest()->first()) ? '➕ Empleado "' . User::where('role', 'empleado')->latest()->first()->name . '" agregado' : null,
        ];
        $actividadReciente = array_filter($actividadReciente);
    
        // Próximos eventos
        $proximosEventos = Evento::where('fecha', '>=', now())
            ->orderBy('fecha')
            ->take(3)
            ->get();

        $notificaciones = [
            '📌 Recuerda asignar tareas para el evento del viernes.',
            '📌 Asignar a Sebastian a el evento del 20/06/25'
            
        ];
    
        // Empleado del mes (puede mejorarse luego con métricas reales)
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
