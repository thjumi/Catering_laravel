<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpleadoService;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    // Obtener todos los empleados (solo para administradores)
    public function index(Request $request)
    {
        $user = $request->user();
        $empleados = $this->empleadoService->getAllEmpleados($user);

        return response()->json($empleados);
    }

    // Obtener un empleado específico por ID
    public function show($id, Request $request)
    {
        $user = $request->user();
        $empleado = $this->empleadoService->getEmpleadoById($id, $user);

        return response()->json($empleado);
    }

    // Crear un nuevo empleado
    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email',
            'telefono'=> 'nullable|string|max:15',
            'rol'     => 'required|string|in:administrador,empleado',
            'subrol' =>'nullable|string|in: Chef, Mesero, Decorador'

        ]);

        $empleado = $this->empleadoService->createEmpleado($data, $user);

        return response()->json($empleado, 201); // 201 Created
    }

    // Asignar un subrol a un empleado
    public function asignarSubrol($id, Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'subrol' => 'required|string|max:255',
        ]);

        $empleado = $this->empleadoService->asignarSubrolEmpleado($id, $data, $user);

        return response()->json([
            'message' => 'Subrol asignado con éxito',
            'data' => $empleado,
        ]);
    }

    // Actualizar un empleado existente
    public function update($id, Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'name'    => 'sometimes|required|string|max:255',
            'email'   => 'sometimes|required|email|unique:users,email,' . $id,
            'telefono'=> 'nullable|string|max:15',
            'rol'     => 'sometimes|required|string|in:administrador,empleado',
        ]);

        $empleado = $this->empleadoService->updateEmpleado($id, $data, $user);

        return response()->json([
            'message' => 'Empleado actualizado con éxito',
            'data' => $empleado,
        ]);
    }

    // Eliminar un empleado
    public function destroy($id, Request $request)
    {
        $user = $request->user();

        $this->empleadoService->deleteEmpleado($id, $user);

        return response()->json(['message' => 'Empleado eliminado con éxito']);
    }
}
