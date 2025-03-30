<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function eventos()
        {
            $eventos = Evento::all();  // Obtiene todos los eventos
            return view('dashboard.admin_eventos', compact('eventos'));
        }
    
    public function dashboard()
    {
        $totalTareas     = Tarea::count();
        $totalEventos    = Evento::count();
        $totalEmpleados  = User::where('role', 'empleado')->count();
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count();

        return view('dashboard.admin', compact('totalEmpleados', 'totalEventos', 'totalTareas', 'tareasPendientes'));
    }
}
