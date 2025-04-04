<x-app-layout>
    <head>
        <script>
            async function cargarTareas() {
                let fecha = document.getElementById('fecha').value;
                if (!fecha) return;

                try {
                    let response = await fetch(`/empleado/${fecha}`);
                    let data = await response.json();

                    let tbody = document.getElementById('tabla-tareas-body');
                    tbody.innerHTML = ''; // Limpia los datos previos

                    if (data.data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-gray-500">No hay tareas para esta fecha.</td></tr>';
                        return;
                    }

                    data.data.forEach(tarea => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${tarea.evento.nombre}</td>
                                <td>${tarea.nombre}</td>
                                <td>${tarea.descripcion}</td>
                                <td>${tarea.fechaTarea}</td>
                                <td>${tarea.estado}</td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    console.error('Error al cargar tareas:', error);
                }
            }
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <x-slot name="header">
        <!-- Contenedor con el logo en la esquina superior derecha -->
        <div class="relative bg-light p-4 rounded shadow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Bienvenido Empleado!') }}
            </h2>
            <div class="absolute top-0 right-0 mt-2 mr-2">
                <img src="/path-to-your-logo/logo.png" alt="Logo de la Empresa" class="h-12 w-auto rounded-md shadow-lg">
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-light">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-center mb-6">Dashboard Empleado</h1>

                    <!-- Selector de fecha -->
                    <div class="date mb-4 text-center">
                        <label for="fecha" class="font-medium text-gray-700 dark:text-gray-300 mb-2">Selecciona una fecha:</label>
                        <input id="fecha" type="date" onchange="cargarTareas()" class="form-control w-full max-w-sm mx-auto">
                    </div>

                    <!-- Tabla de tareas -->
                    <h2 class="text-2xl font-semibold text-center mb-4">Tareas Asignadas</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr class="text-center">
                                    <th>Nombre Evento</th>
                                    <th>Tarea</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-tareas-body">
                                @foreach($tareasAsignadas as $tarea)
                                    <tr>
                                        <td>{{ $tarea->evento->nombre }}</td>
                                        <td>{{ $tarea->nombre }}</td>
                                        <td>{{ $tarea->descripcion }}</td>
                                        <td>{{ $tarea->fechaTarea }}</td>
                                        <td>{{ $tarea->estado }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>
                                            <a href="{{ route('tareas.delete', $tarea->id) }}" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </a>
                                            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary btn-sm">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $tareasAsignadas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
