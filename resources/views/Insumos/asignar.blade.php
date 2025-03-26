@extends('layouts.app')

@section('content')
<h1>Asignar Insumo a Evento</h1>
<form action="{{ route('insumos.asignar', ['insumoId' => $insumo->id, 'eventoId' => $evento->id]) }}" method="POST">
    @csrf
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" required>
    <button type="submit">Asignar</button>
</form>
@endsection
