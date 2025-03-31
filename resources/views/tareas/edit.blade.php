<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Tarea: {{ $tarea->nombre }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $tarea->nombre }}" required
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-bold">Descripción:</label>
                    <textarea name="descripcion" id="descripcion"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">{{ $tarea->descripcion }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="fechaTarea" class="block text-gray-700 font-bold">Fecha de Tarea:</label>
                    <input type="date" name="fechaTarea" id="fechaTarea" value="{{ $tarea->fechaTarea }}" required
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                </div>

                <div class="mb-4">
                    <label for="empleado_id" class="block text-gray-700 font-bold">Asignar a Empleado:</label>
                    <select name="empleado_id" id="empleado_id"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="">Seleccionar Empleado</option>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id }}" @if($empleado->id == $tarea->empleado_id) selected @endif>
                                {{ $empleado->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="evento_id" class="block text-gray-700 font-bold">Seleccionar Evento:</label>
                    <select name="evento_id" id="evento_id"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                        @foreach($eventos as $evento)
                            <option value="{{ $evento->id }}" @if($evento->id == $tarea->evento_id) selected @endif>
                                {{ $evento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Actualizar Tarea
                </button>
                <a href="{{ route('tareas.index') }}" class="text-blue-500 hover:underline">Volver al listado de tareas</a>
            </form>
        </div>
    </div>
</x-app-layout>
