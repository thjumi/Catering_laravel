@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="text-center">Asignar Subrol a Empleado</h1>
    <div class="form-container" style="
        background: #fff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;">
        <form action="{{ route('empleados.asignarSubrol', $empleado->id) }}" method="POST">
            @csrf
            <label for="subrol" style="
                font-weight: 600;
                color: #d4af37;
                margin-top: 1rem;
                display: block;">Subrol:</label>
            <input type="text" name="subrol" id="subrol" class="form-control" placeholder="Escribe el subrol" required style="
                border: 1px solid #d4af37;
                border-radius: 8px;
                padding: 10px;
                font-size: 1rem;
                width: 100%;
                margin-top: 0.5rem;
                background-color: #f5f0da;">
            <button type="submit" class="btn" style="
                background-color: #84b200;
                color: #fff;
                border: none;
                padding: 10px 15px;
                font-weight: 600;
                font-size: 1rem;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.2s ease;
                margin-top: 1.5rem;">Asignar</button>
        </form>
    </div>
</div>
@endsection
