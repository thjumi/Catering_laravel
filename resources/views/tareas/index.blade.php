@extends('layouts.app')

@section('content')
<h1>Listado de Tareas</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
        <tr>
            <td>{{ $tarea->id }}</td>
            <td>{{ $tarea->nombre }}</td>
            <td>
                <a href="{{ route('tareas.show', $tarea->id) }}">Ver</a>
                @if(auth()->user()->rol === 'administrador')
                <a href="{{ route('tareas.edit', $tarea->id) }}">Editar</a>
                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
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
