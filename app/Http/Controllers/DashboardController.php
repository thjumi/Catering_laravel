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
        $totalEmpleados = User::where('role', 'empleado')->count(); // Total de empleados
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count(); // Tareas pendientes
        $totalInsumos = Insumo::count();

        return view('dashboard.admin', compact('eventos', 'totalTareas', 'totalEventos', 'totalEmpleados', 'tareasPendientes', 'totalInsumos'));
    }
}
