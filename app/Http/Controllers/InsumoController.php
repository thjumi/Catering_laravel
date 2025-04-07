<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InsumoService;
use App\Models\User;
use App\Models\Evento;
use App\Models\Insumo;

class InsumoController extends Controller
{
    protected $insumoService;

    public function __construct(InsumoService $insumoService)
    {
        $this->insumoService = $insumoService;
    }

    public function index(Request $request)
    {
        $usuario = $request->user();
        $rolUsuario = strtolower(trim($usuario->role));

        if ($rolUsuario !== 'administrador' && $rolUsuario !== 'administrador stock') {
            abort(403, 'No tienes permiso para ver los insumos.');
        }

        $query = Insumo::with('eventos');

        // Filtro por nombre
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        // Filtro por cantidad mínima
        if ($request->filled('cantidad_minima')) {
            $query->where('cantidad', '>=', $request->cantidad_minima);
        }

        // Filtro por evento asociado
        if ($request->filled('evento')) {
            $query->whereHas('eventos', function ($q) use ($request) {
                $q->where('eventos.id', $request->evento);
            });
        }

        $insumos = $query->get();
        $eventos = Evento::all();

        return view('insumos.index', compact('insumos', 'eventos'));
    }

    public function create()
    {
        $usuarios = User::where('role', 'administrador Stock')->get();
        $eventos = Evento::all();

        return view('insumos.create', compact('usuarios', 'eventos'));
    }

    public function show($id, Request $request)
    {
        $usuario = $request->user();

        if ($usuario->role !== 'administrador' && $usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permiso para ver este insumo.');
        }

        $insumo = $this->insumoService->getInsumoById($id, $usuario);

        return view('insumos.show', compact('insumo'));
    }

    public function store(Request $request)
    {
        $usuario = $request->user();

        if ($usuario->role !== 'administrador Stock') {
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

        return redirect()->route('dashboard.stock');
    }

    public function edit($id)
    {
        $usuario = request()->user();

        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permisos para editar insumos.');
        }

        $insumo = $this->insumoService->getInsumoById($id, $usuario);
        $eventos = Evento::all();

        if (!$insumo) {
            abort(404, 'El insumo no fue encontrado.');
        }

        return view('insumos.edit', compact('insumo', 'eventos'));
    }

    public function update($id, Request $request)
    {
        $usuario = $request->user();

        if ($usuario->role !== 'administrador Stock') {
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

        return redirect()->route('dashboard.stock');
    }

    public function destroy($id, Request $request)
    {
        $usuario = $request->user();

        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permisos para eliminar insumos.');
        }

        $this->insumoService->deleteInsumo($id, $usuario);

        return redirect()->route('dashboard.stock');
    }

    public function asignarAEvento(Request $request, $insumoId, $eventoId)
    {
        $usuario = $request->user();

        if ($usuario->role !== 'administrador Stock') {
            abort(403, 'No tienes permisos para asignar insumos a eventos.');
        }

        $data = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $this->insumoService->asignarInsumoAEvento($insumoId, $eventoId, $data['cantidad'], $usuario);

        return redirect()->route('insumos.index');
    }
}
