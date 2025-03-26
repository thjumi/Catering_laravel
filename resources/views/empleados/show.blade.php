@extends('layouts.app')

@section('content')
<h1>Detalles del Empleado</h1>
<p><strong>ID:</strong> {{ $empleado->id }}</p>
<p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
<p><strong>Rol:</strong> {{ $empleado->rol }}</p>
<p><strong>Subrol:</strong> {{ $empleado->subrol ?? 'Sin subrol' }}</p>
<a href="{{ route('empleados.index') }}">Volver al listado</a>
@endsection
