@extends('layouts.app')

@section('content')
<h1>Editar Tarea</h1>
<form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $tarea->nombre }}" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required>{{ $tarea->descripcion }}</textarea>
    <button type="submit">Actualizar</button>
</form>
@endsection
