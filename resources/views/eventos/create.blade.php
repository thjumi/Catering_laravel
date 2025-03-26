@extends('layouts.app')

@section('content')
<h1>Crear Evento</h1>
<form action="{{ route('eventos.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>
    <button type="submit">Crear</button>
</form>
@endsection
