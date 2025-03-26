
@extends('layouts.app')

@section('content')
<h1>Dashboard de Administrador de Stock</h1>

<h2>Insumos</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($insumos as $insumo)
        <tr>
            <td>{{ $insumo->id }}</td>
            <td>{{ $insumo->nombre }}</td>
            <td>{{ $insumo->cantidad }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Eventos</h2>
<ul>
    @foreach($eventos as $evento)
    <li>{{ $evento->nombre }} - Fecha: {{ $evento->fecha }}</li>
    @endforeach
</ul>
@endsection
