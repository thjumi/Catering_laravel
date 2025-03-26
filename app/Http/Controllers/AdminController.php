<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado; // Modelo para los empleados
use App\Models\Tarea; // Modelo para las tareas
use App\Models\Evento; // Modelo para los eventos

class AdminController extends Controller
{
    // Método para el Dashboard del Administrador
    public function dashboard()
    {
        $totalEmpleados = Empleado::count(); // Número total de empleados
        $totalEventos = Evento::count(); // Número total de eventos
        $totalTareas = Tarea::count(); // Número total de tareas
        $tareasPendientes = Tarea::where('estado', 'pendiente')->count(); // Total de tareas pendientes
    
        // Retornar la vista del Dashboard con las variables necesarias
        return view('dashboard.admin', compact('totalEmpleados', 'totalEventos', 'totalTareas', 'tareasPendientes'));
    }
}
