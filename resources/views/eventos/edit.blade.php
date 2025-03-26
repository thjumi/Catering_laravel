@extends('layouts.app')

@section('content')
<h1>Editar Evento</h1>
<form action="{{ route('eventos.update', $evento->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $evento->nombre }}" required>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" value="{{ $evento->fecha }}" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required>{{ $evento->descripcion }}</textarea>
    <button type="submit">Actualizar</button>
</form>
@endsection
