@extends('layouts.app')

@section('content')
<h1>Detalles del Insumo</h1>
<p><strong>ID:</strong> {{ $insumo->id }}</p>
<p><strong>Nombre:</strong> {{ $insumo->nombre }}</p>
<p><strong>Descripción:</strong> {{ $insumo->descripcion }}</p>
<a href="{{ route('insumos.index') }}">Volver al listado</a>
@endsection
