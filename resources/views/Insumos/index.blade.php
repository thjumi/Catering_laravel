@extends('layouts.app')

@section('content')
<h1>Listado de Insumos</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($insumos as $insumo)
        <tr>
            <td>{{ $insumo->id }}</td>
            <td>{{ $insumo->nombre }}</td>
            <td>
                <a href="{{ route('insumos.show', $insumo->id) }}">Ver</a>
                @if(auth()->user()->rol === 'administrador stock')
                <a href="{{ route('insumos.edit', $insumo->id) }}">Editar</a>
                <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
