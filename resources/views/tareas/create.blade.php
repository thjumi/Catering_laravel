@extends('layouts.app')

@section('content')
<h1>Crear Nueva Tarea</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tareas.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea>

    <label for="fechaTarea">Fecha de Tarea:</label>
    <input type="date" name="fechaTarea" id="fechaTarea" required>

    <button type="submit">Crear Tarea</button>
</form>

<a href="{{ route('tareas.index') }}">Volver al listado de tareas</a>
@endsection
