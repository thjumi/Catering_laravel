@extends('layouts.app')

@section('content')
<h1>Crear Empleado</h1>
<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="rol">Rol:</label>
    <select name="rol" id="rol" required>
        <option value="empleado">Empleado</option>
        <option value="administrador">Administrador</option>
    </select>
    <button type="submit">Crear</button>
</form>
@endsection
