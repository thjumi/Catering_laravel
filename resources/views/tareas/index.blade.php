@extends('layouts.app')

@section('content')
<h1>Listado de Tareas</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($tareas->isEmpty())
    <p>No hay tareas registradas. <a href="{{ route('tareas.create') }}">Crear una nueva tarea</a></p>
@else
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
@endif

<a href="{{ route('tareas.create') }}">Crear Nueva Tarea</a>
@endsection
