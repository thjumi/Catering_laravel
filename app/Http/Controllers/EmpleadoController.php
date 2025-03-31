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

        /*return response()->json($empleados);*/
        return view('empleados.index', compact('empleados'));
    }

    // Obtener un empleado específico por ID
    public function show($id, Request $request)
    {
        $user = $request->user();
        $empleado = $this->empleadoService->getEmpleadoById($id, $user);

        return response()->json($empleado);
    }


    public function create(){
        return view('empleados.create');

    }

    // Crear un nuevo empleado
    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email',
            'rol'     => 'required|string|in:administrador,empleado',
            'subrol'  => 'nullable|string|in:chef,mesero,decorador',

        ]);

        $empleado = $this->empleadoService->createEmpleado($data, $user);

        return redirect('/empleados');
    }

    public function edit($id, Request $request){
        $user = $request->user();
        $empleado = $this->empleadoService->getEmpleadoById($id, $user);

        return view('empleados.edit',[ 'empleado' => $empleado, 'user' => $user]);

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
            'nombre'    => 'sometimes|required|string|max:255',
            'email'   => 'sometimes|required|email|unique:users,email,' . $id,
            'rol'     => 'sometimes|required|string|in:administrador,empleado',
            'subrol'    => 'sometimes|required|string|in:chef,mesero,decorador',
        ]);

        $empleado = $this->empleadoService->updateEmpleado($id, $data, $user);

        return redirect('/empleados');
    }

    // Eliminar un empleado
    public function destroy($id, Request $request)
    {
        $user = $request->user();

        $this->empleadoService->deleteEmpleado($id, $user);

        return redirect('/empleados');
    }
}
