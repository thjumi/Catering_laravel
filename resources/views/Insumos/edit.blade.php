@extends('layouts.app')

@section('content')
<h1>Editar Insumo</h1>
<form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $insumo->nombre }}" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required>{{ $insumo->descripcion }}</textarea>
    <button type="submit">Actualizar</button>
</form>
@endsection
