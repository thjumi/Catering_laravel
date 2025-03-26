@extends('layouts.app')

@section('content')
<h1>Crear Insumo</h1>
<form action="{{ route('insumos.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>
    <button type="submit">Crear</button>
</form>
@endsection
