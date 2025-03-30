<x-app-layout>
    <head>
        <script>
            async function cargarTareas() {
                let fecha = document.getElementById('fecha').value; // Obtener la fecha seleccionada
                if (!fecha) return;

                try {
                    let response = await fetch(`/empleado/${fecha}`); // Llamar a Laravel
                    let data = await response.json(); // Convertir respuesta en JSON

                    let tbody = document.getElementById('tabla-tareas-body');
                    tbody.innerHTML = ''; // Limpiar antes de agregar nuevos pedidos

                    if (data.data.length === 0) {
                        tbody.innerHTML = '<p>No hay tareas para esta fecha.</p>';
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
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido Empleado!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-green-300">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-success">
                    <h1 class="text-center">Dashboard Empleado</h1>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                    <div class="container mt-5">
                        <div class="date">
                            <input id="fecha" type="date" onchange="cargarTareas()">
                        </div>

                        <h1 class="text-center">Tareas Asignadas</h1>

                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Nombre Evento</th>
                                    <th>Tarea</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-tareas-body">
                                @foreach($tareasAsignadas as $tareasAsignada)
                                <tr>
                                    <td>{{ $tareasAsignada->evento->nombre }}</td>
                                    <td>{{ $tareasAsignada->nombre }}</td>
                                    <td>{{ $tareasAsignada->descripcion }}</td>
                                    <td>{{ $tareasAsignada->fechaTarea }}</td>
                                    <td>{{ $tareasAsignada->estado }}</td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tareasAsignadas->links() }}
            </div>
        </div>
    </div>
 </div>
</x-app-layout>



