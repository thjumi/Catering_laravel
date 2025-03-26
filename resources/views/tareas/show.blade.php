@extends('layouts.app')

@section('content')
<h1>Detalles de la Tarea</h1>
<p><strong>ID:</strong> {{ $tarea->id }}</p>
<p><strong>Nombre:</strong> {{ $tarea->nombre }}</p>
<p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
<a href="{{ route('tareas.index') }}">Volver al listado</a>
@endsection
