<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Evento') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 max-w-xl bg-gray-800 rounded-lg shadow-lg text-white">
        <h1 class="text-center mb-6 text-3xl font-bold">Editar Evento</h1>

        {{-- Mostrar mensajes de error --}}
        @if ($errors->any())
            <div class="bg-red-500 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium">Nombre del Evento:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $evento->nombre) }}"
                       class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500" required minlength="10" maxlength="40">
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-medium">Fecha:</label>
                <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $evento->fecha) }}"
                       class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Horario -->
            <div class="mb-4">
                <label for="horario" class="block text-sm font-medium">Horario:</label>
                <input type="time" name="horario" id="horario" value="{{ old('horario', $evento->horario) }}"
                       class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Número de Invitados -->
            <div class="mb-4">
                <label for="num_invitados" class="block text-sm font-medium">Número de Invitados:</label>
                <input type="number" name="num_invitados" id="num_invitados" value="{{ old('num_invitados', $evento->num_invitados) }}"
                       class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500" required>{{ old('descripcion', $evento->descripcion) }}</textarea>
            </div>

            <!-- Asignar Empleado -->
            <div class="mb-4">
                <label for="usuario_id" class="block text-sm font-medium">Asignar Empleado:</label>
                <select name="usuario_id" id="usuario_id"
                        class="w-full mt-1 p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Seleccione un empleado</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id', $evento->empleado_id) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }} (ID: {{ $usuario->id }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de Guardar -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-lg">Actualizar Evento</button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('eventos.index') }}" class="text-green-400 hover:text-green-500 underline">Volver al listado de eventos</a>
        </div>
    </div>
</x-app-layout>
