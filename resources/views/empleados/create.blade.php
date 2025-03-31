<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  bg-green-300">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                    <h1 class="text-center">Crear Empleado</h1>
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                        @error('nombre')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                        @error('email')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="rol">Rol:</label>
                        <select class="form-select" name="rol" id="rol" required>
                            <option value="empleado">Empleado</option>
                            <option value="administrador">Administrador</option>
                        </select>
                        @error('rol')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="subrol">Subrol:</label>
                        <input type="text" class="form-control" name="subrol" id="subrol" required>
                        @error('subrol')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br/>
                        <button class="btn btn-success" type="submit">Crear</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
