<x-app-layout>
    <head>
        <script>
            async function cargarEventos() {
                let fecha = document.getElementById('fecha').value;
                if (!fecha) return;

                try {
                    let response = await fetch(`/eventos/${fecha},1`);
                    let data = await response.json();

                    let tbody = document.getElementById('tabla-eventos-body');
                    tbody.innerHTML = ''; // Limpia los datos previos

                    if (data.data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-gray-500">No hay eventos para esta fecha.</td></tr>';
                        return;
                    }

                    var ruta = "{{ route('eventos.show','id')}} ";
                    var ruta2 = "{{ route('eventos.edit','id')}}";
                    var ruta3 = "{{ route('eventos.destroy','id')}}";


                    data.data.forEach(evento => {

                        var route = ruta.replace('id', evento.id);
                        var route2 = ruta2.replace('id', evento.id);
                        var route3 = ruta3.replace('id', evento.id);
                        tbody.innerHTML += `
                            <tr>
                                <td>${evento.nombre}</td>
                                <td>${evento.fecha}</td>
                                <td>${evento.horario}</td>
                                <td>${evento.empleado?.name ?? 'No asignado'} </td>
                                <td>${evento.descripcion} </td>
                                 <td class="px-4 py-2 border-b text-gray-500 border-gray-500">
                                     <a href="${route}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Ver Detalles</a>
                                     <a href="${route2}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Editar</a>
                                    <form action="${route3}" method="POST" class="inline">
                                         @csrf
                                         @method('DELETE')
                                      <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm"
                                       onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    console.error('Error al cargar eventos:', error);
                }
            }
        </script>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">

                     <div class="mb-4 flex items-center">
                        <label for="fecha" class="mr-2 text-gray-700 dark:text-gray-300">Filtrar por fecha:</label>
                        <input type="date" name="fecha" id="fecha"  onchange="cargarEventos()"  class="px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    </div>
                    <a href="{{ route('eventos.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Añadir Evento</a>

                    <!-- Tabla de eventos -->
                    <table class="w-full mt-6 border border-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr class="text-left text-gray-700 dark:text-gray-300">
                                <th class="px-4 py-2 border-b border-gray-300">Nombre</th>
                                <th class="px-4 py-2 border-b border-gray-300">Fecha</th>
                                <th class="px-4 py-2 border-b border-gray-300">Horario</th>
                                <th class="px-4 py-2 border-b border-gray-300">Empleado Asignado</th>
                                <th class="px-4 py-2 border-b border-gray-300">Descripción</th>
                                <th class="px-4 py-2 border-b border-gray-300">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-eventos-body">
                            @if($eventos->isEmpty())
                                <tr>
                                    <td colspan="7" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                        No hay eventos registrados.
                                    </td>
                                </tr>
                            @else
                                @foreach($eventos as $evento)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 border-b text-gray border-gray-300">{{ $evento->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-gray border-gray-300">{{ $evento->fecha }}</td>
                                        <td class="px-4 py-2 border-b text-gray border-gray-300">{{ $evento->horario }}</td>
                                        <td class="px-4 py-2 border-b text-gray border-gray-300">
                                            {{ $evento->empleado?->name ?? 'No asignado' }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-gray-500 border-gray-500">{{ $evento->descripcion }}</td>
                                        <!--<td class="px-4 py-4 border-b text-black border-gray-500">
                                             <td class="px-4 py-2 border-b text-gray-500 border-gray-500">{{ $evento->descripcion }}</td>
                                            {{ $evento->Estado }}
                                            <select name="estado" class="px-1 py-1 border rounded-lg">
                                                <option value="activo">Completado</option>
                                                <option value="inactivo">No Completado</option>
                                                <option value="activo">En proceso</option>
                                            </select>
                                        </td>-->
                                        <td class="px-4 py-2 border-b text-gray-500 border-gray-500">
                                            <a href="{{ route('eventos.show', $evento->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Ver Detalles</a>
                                            <a href="{{ route('eventos.edit', $evento->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Editar</a>
                                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div class="mt-4">
                   {{ $eventos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
