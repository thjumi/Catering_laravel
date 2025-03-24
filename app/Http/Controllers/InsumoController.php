<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InsumoService;

class InsumoController extends Controller
{
    protected $insumoService;

    public function __construct(InsumoService $insumoService)
    {
        $this->insumoService = $insumoService;
    }

    // Obtener todos los insumos según el rol del usuario
    public function index(Request $request)
    {
        $usuario = $request->user();
        $insumos = $this->insumoService->getAllInsumos($usuario);

        return response()->json($insumos);
    }

    // Obtener un insumo específico por ID
    public function show($id, Request $request)
    {
        $usuario = $request->user();
        $insumo = $this->insumoService->getInsumoById($id, $usuario);

        return response()->json($insumo);
    }

    // Crear un nuevo insumo
    public function store(Request $request)
    {
        $usuario = $request->user();
        $data = $request->validate([
            'nombre' => 'required|string|max:250',
            'descripcion' => 'nullable|string',
            'cantidad' => 'nullable|integer',
            'stock' => 'sometimes|required|boleean',
            'estado' => 'sometimes|required|integer|min:0',
            'tipoInsumo' => 'required|string|max:255',
            'lugarAlmacen' => 'required|string|max:255',
        ]);

        $insumo = $this->insumoService->createInsumo($data, $usuario);

        return response()->json($insumo, 201); // 201 Created
    }

    // Actualizar un insumo existente
    public function update($id, Request $request)
    {
        $usuario = $request->user();
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:250',
            'descripcion' => 'nullable|string',
            'cantidad' => 'nullable|integer',
            'stock' => 'sometimes|required|boleean',
            'estado' => 'sometimes|required|integer|min:0',
            'tipoInsumo' => 'sometimes|required|string|max:255',
            'lugarAlmacen' => 'sometimes|required|string|max:255',
        ]);

        $insumo = $this->insumoService->updateInsumo($id, $data, $usuario);

        return response()->json($insumo);
    }

    // Eliminar un insumo
    public function destroy($id, Request $request)
    {
        $usuario = $request->user();

        $this->insumoService->deleteInsumo($id, $usuario);

        return response()->json(['message' => 'Insumo eliminado con éxito']);
    }

    // Asignar un insumo a un evento
    public function asignarAEvento(Request $request, $insumoId, $eventoId)
    {
        $usuario = $request->user();
        $data = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $this->insumoService->asignarInsumoAEvento($insumoId, $eventoId, $data['cantidad'], $usuario);

        return response()->json(['message' => 'Insumo asignado al evento con éxito']);
    }
}
