@extends('layouts.app')

@section('content')
<h1>Asignar Subrol a Empleado</h1>
<form action="{{ route('empleados.asignarSubrol', $empleado->id) }}" method="POST">
    @csrf
    <label for="subrol">Subrol:</label>
    <input type="text" name="subrol" id="subrol" required>
    <button type="submit">Asignar</button>
</form>
@endsection
