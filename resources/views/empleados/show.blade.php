@extends('layouts.app')

@section('content')
<div style="
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
    font-family: 'Poppins', sans-serif;
    color: #333;">
    <h1 style="
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        color: #026b29;
        margin-bottom: 1.5rem;">Detalles del Empleado</h1>
    <p style="
        font-weight: 600;
        margin-bottom: 1rem;"><strong>ID:</strong> {{ $empleado->id }}</p>
    <p style="
        font-weight: 600;
        margin-bottom: 1rem;"><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
    <p style="
        font-weight: 600;
        margin-bottom: 1rem;"><strong>Rol:</strong> {{ $empleado->rol }}</p>
    <p style="
        font-weight: 600;
        margin-bottom: 1.5rem;"><strong>Subrol:</strong> {{ $empleado->subrol ?? 'Sin subrol' }}</p>
    <a href="{{ route('empleados.index') }}" style="
        display: inline-block;
        background-color: #84b200;
        color: #fff;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;">
        Volver al listado
    </a>
</div>
@endsection
