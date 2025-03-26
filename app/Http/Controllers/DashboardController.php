<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Insumo;
use App\Models\Tarea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function empleado()
    {
        $tareasAsignadas = Tarea::whereHas('eventoEmpleado', function ($query) {
            $query->where('empleado_id', auth('user')->user()->id);
        })->get();

        return view('dashboard.empleado', compact('tareasAsignadas'));
    }

    public function stock()
    {
        $insumos = Insumo::all();
        $eventos = Evento::all();

        return view('dashboard.stock', compact('insumos', 'eventos'));
    }

    public function admin()
    {
        $tareas = Tarea::count();
        $insumos = Insumo::count();
        $eventos = Evento::count();
        $empleados = \App\Models\Empleado::count();

        return view('dashboard.admin', compact('tareas', 'insumos', 'eventos', 'empleados'));
    }
}
