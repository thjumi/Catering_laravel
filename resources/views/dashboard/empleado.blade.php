<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Empleados') }}
        </h2>
    </x-slot>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-green-300">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center">Empleados</h1>

                    <!-- Filtro por SubRol -->
                    <form method="GET" action="{{ route('empleados.index') }}" class="mb-3 d-flex align-items-center">
                        <label for="subrol" class="form-label me-2">Filtrar por SubRol:</label>
                        <select name="subrol" id="subrol" class="form-select me-2" onchange="this.form.submit()">
                            <option value="">Todos</option>
                            @foreach($subroles as $subrol)
                                <option value="{{ $subrol }}" {{ request('subrol') == $subrol ? 'selected' : '' }}>
                                    {{ ucfirst($subrol) }}
                                </option>
                            @endforeach
                        </select>
                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Reset</a>
                    </form>

                    <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3">Añadir Empleado</a>

                    <table class="table table-bordered">
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
                                    <td>{{ $empleado->subrol }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('empleados.edit', $empleado->id) }}"
                                            class="btn btn-warning btn-sm me-2">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST"
                                            onsubmit="return confirm('¿Desea eliminar a {{ $empleado->name }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Borrar
                                            </button>
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</x-app-layout>
