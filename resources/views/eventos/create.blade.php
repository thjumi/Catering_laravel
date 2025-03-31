<x-app-layout>
    <div class="container mx-auto p-6 max-w-xl bg-gray-800 rounded-lg shadow-lg text-white">
        <h1 class="text-center mb-6 text-3xl font-bold">Crear Evento</h1>

        @if ($errors->any())
        <div class="bg-red-500 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium">Nombre del Evento:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del evento"
                    class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    required>
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-sm font-medium">Fecha:</label>
                <input type="date" name="fecha" id="fecha"
                    class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    required>
            </div>

            <!-- Horario -->
            <div class="mb-4">
                <label for="horario" class="block text-sm font-medium">Horario:</label>
                <input type="time" name="horario" id="horario"
                    class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    required>
            </div>

            <!-- Número de Invitados -->
            <div class="mb-4">
                <label for="num_invitados" class="block text-sm font-medium">Número de Invitados:</label>
                <input type="number" name="num_invitados" id="num_invitados"
                    placeholder="Ingrese el número de invitados"
                    class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    required>
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                    placeholder="Ingrese una breve descripción del evento"
                    class="w-full mt-1 p-2 bg-gray-700 text-black placeholder-gray-400 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500"></textarea>
            </div>

            <!-- Asignar Empleado -->
            <div class="mb-4">
                <label for="usuario_id" class="block text-sm font-medium">Asignar Usuario:</label>
                <select name="usuario_id" id="usuario_id"
                    class="w-full mt-1 p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Seleccione un empleado</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }} (ID: {{ $usuario->id }})</option>
                    @endforeach
                </select>
            </div>


            <!-- Botón de Crear -->
            <div class="text-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded-lg">Crear
                    Evento</button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('eventos.index') }}" class="text-green-400 hover:text-green-500 underline">Volver al
                listado de eventos</a>
        </div>
    </div>
</x-app-layout>
