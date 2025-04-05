<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="
            background: #f7f5f0;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
                    <h1 class="text-center" style="
                        font-family: 'Poppins', sans-serif;
                        font-size: 2rem;
                        font-weight: bold;
                        color: #026b29;
                        margin-bottom: 1.5rem;">Editar Empleado</h1>
                    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" style="
                        background: #fff;
                        padding: 2rem;
                        border-radius: 12px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                        @csrf
                        @method('PUT')
                        <label for="nombre" style="
                            font-weight: 600;
                            color: #d4af37;
                            margin-top: 1rem;
                            display: block;">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $empleado->name }}" required style="
                            border: 1px solid #d4af37;
                            border-radius: 8px;
                            padding: 10px;
                            font-size: 1rem;
                            width: 100%;
                            margin-top: 0.5rem;
                            background-color: #f5f0da;">
                        @error('nombre')
                            <div class="text-danger" style="
                                color: #c9302c;
                                font-size: 0.9rem;
                                margin-top: 0.5rem;">{{ $message }}</div>
                        @enderror

                        <label for="email" style="
                            font-weight: 600;
                            color: #d4af37;
                            margin-top: 1rem;
                            display: block;">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required style="
                            border: 1px solid #d4af37;
                            border-radius: 8px;
                            padding: 10px;
                            font-size: 1rem;
                            width: 100%;
                            margin-top: 0.5rem;
                            background-color: #f5f0da;">
                        @error('email')
                            <div class="text-danger" style="
                                color: #c9302c;
                                font-size: 0.9rem;
                                margin-top: 0.5rem;">{{ $message }}</div>
                        @enderror

                        <label for="rol" style="
                            font-weight: 600;
                            color: #d4af37;
                            margin-top: 1rem;
                            display: block;">Rol:</label>
                        <select class="form-select" name="rol" id="rol" required style="
                            border: 1px solid #d4af37;
                            border-radius: 8px;
                            padding: 10px;
                            font-size: 1rem;
                            width: 100%;
                            margin-top: 0.5rem;
                            background-color: #f5f0da;">
                            <option value="empleado" {{ $empleado->rol === 'empleado' ? 'selected' : '' }}>Empleado</option>
                            <option value="administrador" {{ $empleado->rol === 'administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>
                        @error('rol')
                            <div class="text-danger" style="
                                color: #c9302c;
                                font-size: 0.9rem;
                                margin-top: 0.5rem;">{{ $message }}</div>
                        @enderror

                        <label for="subrol" style="
                            font-weight: 600;
                            color: #d4af37;
                            margin-top: 1rem;
                            display: block;">Subrol:</label>
                        <input type="text" class="form-control" name="subrol" id="subrol" value="{{ $empleado->subrole }}" {{ $empleado->role !== 'empleado' ? 'disabled' : '' }} style="
                            border: 1px solid #d4af37;
                            border-radius: 8px;
                            padding: 10px;
                            font-size: 1rem;
                            width: 100%;
                            margin-top: 0.5rem;
                            background-color: #f5f0da;">
                        @error('subrol')
                            <div class="text-danger" style="
                                color: #c9302c;
                                font-size: 0.9rem;
                                margin-top: 0.5rem;">{{ $message }}</div>
                        @enderror
                        <br>
                        <button class="btn btn-success" type="submit" style="
                            background-color: #84b200;
                            color: #fff;
                            font-weight: 600;
                            padding: 10px 15px;
                            border-radius: 10px;
                            border: none;
                            transition: all 0.2s ease;">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

