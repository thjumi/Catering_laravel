@extends('layouts.app')

@section('content')
<h1>Editar Empleado</h1>
<form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}" required>
    <label for="rol">Rol:</label>
    <select name="rol" id="rol" required>
        <option value="empleado" {{ $empleado->rol === 'empleado' ? 'selected' : '' }}>Empleado</option>
        <option value="administrador" {{ $empleado->rol === 'administrador' ? 'selected' : '' }}>Administrador</option>
    </select>
    <label for="subrol">Subrol:</label>
    <input type="text" name="subrol" id="subrol" value="{{ $empleado->subrol }}" {{ $empleado->rol !== 'empleado' ? 'disabled' : '' }}>
    <button type="submit">Actualizar</button>
</form>
@endsection
