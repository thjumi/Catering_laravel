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

    public function empleado()
    {
        $tareasAsignadas = Tarea::with('evento')->where('empleado_id', Auth::id())->paginate(10);
        return view('dashboard.empleado', compact('tareasAsignadas'));
    }

    public function obtenerTareasFecha($fecha)
    {
        $tareas = Tarea::with('evento')->whereDate('fechaTarea', $fecha)->paginate(10);
        return response()->json($tareas, 200, [], JSON_PRETTY_PRINT);
    }


    public function stock()
    {
        $insumos = Insumo::all();
        $eventos = Evento::all();

        return view('dashboard.stock', compact('insumos', 'eventos'));
    }

    public function admin()
    {
        $eventos = Evento::all(); // Obtener eventos de la BD
        $totalTareas = Tarea::count();
        $totalEventos = Evento::count();
        $totalEmpleados = User::where('role', 'empleado')->count();
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count();

        return view('dashboard.admin', compact('eventos', 'totalTareas', 'totalEventos', 'totalEmpleados', 'tareasPendientes'));
    }
}

