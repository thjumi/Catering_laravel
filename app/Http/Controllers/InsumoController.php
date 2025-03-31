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

    // Obtener todos los insumos (solo visualización para el Administrador)
    public function index(Request $request)
    {
        $usuario = $request->user();
        
        // Verificar que el usuario sea Administrador o Administrador de Stock
        if ($usuario->role !== 'administrador' && $usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permiso para ver los insumos.');
        }

        // Obtener los insumos para ambos roles
        $insumos = $this->insumoService->getAllInsumos($usuario);

        return view('insumos.index', compact('insumos')); // Devuelve la vista con los insumos
    }

    // Obtener un insumo específico por ID
    public function show($id, Request $request)
    {
        $usuario = $request->user();
        
        // Verificar que el usuario sea Administrador o Administrador de Stock
        if ($usuario->role !== 'administrador' && $usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permiso para ver este insumo.');
        }

        $insumo = $this->insumoService->getInsumoById($id, $usuario);

        return view('insumos.show', compact('insumo')); // Devuelve la vista de detalles
    }

    // Crear un nuevo insumo (solo para Administrador de Stock)
    public function store(Request $request)
    {
        $usuario = $request->user();
        
        if ($usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permisos para crear insumos.');
        }

        $data = $request->validate([
            'nombre'         => 'required|string|max:250',
            'descripcion'    => 'nullable|string',
            'cantidad'       => 'nullable|integer',
            'stock'          => 'sometimes|required|integer|min:0',
            'disponibilidad' => 'sometimes|required|boolean',
            'tipoInsumo'     => 'required|string|max:255',
            'lugarAlmacen'   => 'required|string|max:255',
        ]);

        $insumo = $this->insumoService->createInsumo($data, $usuario);

        return redirect()->route('insumos.index'); // Redirigir al listado de insumos
    }

    // Actualizar un insumo existente (solo para Administrador de Stock)
    public function update($id, Request $request)
    {
        $usuario = $request->user();
        
        if ($usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permisos para actualizar insumos.');
        }

        $data = $request->validate([
            'nombre'         => 'sometimes|required|string|max:250',
            'descripcion'    => 'nullable|string',
            'cantidad'       => 'nullable|integer',
            'stock'          => 'sometimes|required|integer|min:0',
            'disponibilidad' => 'sometimes|required|boolean',
            'tipoInsumo'     => 'sometimes|required|string|max:255',
            'lugarAlmacen'   => 'sometimes|required|string|max:255',
        ]);

        $insumo = $this->insumoService->updateInsumo($id, $data, $usuario);

        return redirect()->route('insumos.index'); // Redirigir al listado de insumos
    }

    // Eliminar un insumo (solo para Administrador de Stock)
    public function destroy($id, Request $request)
    {
        $usuario = $request->user();
        
        if ($usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permisos para eliminar insumos.');
        }

        $this->insumoService->deleteInsumo($id, $usuario);

        return redirect()->route('insumos.index'); // Redirigir al listado de insumos
    }

    // Asignar un insumo a un evento (solo para Administrador de Stock)
    public function asignarAEvento(Request $request, $insumoId, $eventoId)
    {
        $usuario = $request->user();
        
        if ($usuario->role !== 'administrador_stock') {
            abort(403, 'No tienes permisos para asignar insumos a eventos.');
        }

        $data = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $this->insumoService->asignarInsumoAEvento($insumoId, $eventoId, $data['cantidad'], $usuario);

        return redirect()->route('insumos.index'); // Redirigir al listado de insumos
    }
}
