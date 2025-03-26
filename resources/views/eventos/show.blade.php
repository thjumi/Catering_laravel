@extends('layouts.app')

@section('content')
<h1>Detalles del Evento</h1>
<p><strong>ID:</strong> {{ $evento->id }}</p>
<p><strong>Nombre:</strong> {{ $evento->nombre }}</p>
<p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
<p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
<a href="{{ route('eventos.index') }}">Volver al listado</a>
@endsection
