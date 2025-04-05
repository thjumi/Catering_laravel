<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Empleados') }}
        </h2>
    </x-slot>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: #f7f5f0;
                color: #333;
                font-family: 'Poppins', sans-serif;
            }

            h1.text-center {
                font-size: 2rem;
                color: #026b29;
                font-weight: bold;
                margin-bottom: 1.5rem;
            }

            .bg-green-300 {
                background: #fff !important;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .btn-success {
                background-color: #84b200;
                border: none;
                transition: all 0.2s ease;
                font-weight: 600;
            }

            .btn-success:hover {
                background-color: #b9972d;
                transform: scale(1.03);
            }

            .btn-warning {
                background-color: #f5f0da;
                color: #d4af37;
                border: none;
            }

            .btn-warning:hover {
                background-color: #d4af37;
                color: #fff;
            }

            .btn-danger {
                background-color: #c9302c;
                border: none;
            }

            .btn-danger:hover {
                background-color: #a12020;
            }

            .table {
                background: #fff;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            }

            .table th {
                background: #f5f0da;
                color: #d4af37;
                text-align: center;
            }

            .table td {
                text-align: center;
            }

            .alert-success {
                background-color: #f5f0da !important;
                color: #026b29 !important;
                border-radius: 8px;
            }

            .pagination {
                display: flex;
                justify-content: center;
            }

            .pagination .page-link {
                color: #026b29;
                background-color: #f5f0da;
                border: none;
                margin: 0 3px;
                border-radius: 5px;
                padding: 5px 10px;
                transition: all 0.2s ease;
            }

            .pagination .page-link:hover {
                background-color: #026b29;
                color: #fff;
            }
        </style>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-green-300">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center">Empleados</h1>
                    <a href="{{ route('empleados.create') }}" class="btn btn-success">Añadir Empleado</a>
                    <table class="table table-bordered mt-4">
                        <thead class="table-success">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>SubRol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->name }}</td>
                                <td>{{ $empleado->email }}</td>
                                <td>{{ $empleado->role }}</td>
                                <td>{{ $empleado->subrole }}</td>
                                <td>
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea Eliminar?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $empleados->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</x-app-layout>
