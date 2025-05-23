<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario - Catering Soft</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f7f5f0;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #fff;
            color: #d4af37;
            padding: 2rem 1rem;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            color: #d4af37;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 10px;
            transition: background 0.2s ease;
            color: #555;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #f5f0da;
            color: #d4af37;
            font-weight: 600;
        }

        .sidebar .logo img {
            max-width: 100%;
            margin-top: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .main {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        .main.sidebar-hidden {
            margin-left: 0;
        }

        .main h1 {
            font-size: 2rem;
            color: #d4af37;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .card h3 {
            font-size: 1.2rem;
            color: #d4af37;
            margin-bottom: 0.5rem;
        }

        .card p {
            font-size: 1.6rem;
            font-weight: bold;
            color: #444;
        }

        .btn-gold {
            background-color: #d4af37;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .btn-gold:hover {
            background-color: #b9972d;
            transform: scale(1.03);
        }

        .text-gold {
            color: #d4af37 !important;
        }

        .toggle-sidebar {
            display: none;
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #d4af37;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 1rem;
            z-index: 1100;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: block;
            }
        }
    </style>
</head>

<body>
    <button class="toggle-sidebar" onclick="toggleSidebar()">☰</button>

    <div class="sidebar" id="sidebar">
        <div>
            <h2>Catering Soft</h2>
            <a href="{{ route('insumos.index') }}" class="active">Insumos</a>
        </div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="logout-button">
            <i class='bx bx-log-out'></i> Cerrar Sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="logo text-center">
            <img src="{{ asset('img/home/logp.png') }}" alt="Logo Catering Soft">
        </div>
    </div>

    <div class="main" id="main">
        <h1>Gestión de Inventario</h1>

        <div class="card shadow mb-5">
            <div class="card-body">
                <h3 class="mb-4 text-gold">Lista de Insumos</h3>

                <!-- Filtros -->
                <form method="GET" action="{{ route('dashboard.stock') }}" class="row g-3 mb-4">
                    <div class="col-md-5">
                        <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                            value="{{ request('nombre') }}">
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="cantidad_minima" class="form-control" placeholder="Cantidad mínima"
                            value="{{ request('cantidad_minima') }}">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn-gold">Filtrar</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($insumos as $insumo)
                            <tr>
                                <td class="text-center">{{ $insumo->id }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td class="text-center">{{ $insumo->cantidad }}</td>
                                <td class="text-center">
                                    <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                    <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás segura de que deseas eliminar este insumo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay insumos registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('insumos.create') }}" class="btn-gold">
                        Crear nuevo insumo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main');
            sidebar.classList.toggle('show');
            main.classList.toggle('sidebar-hidden');
        }
    </script>
</body>

</html>

