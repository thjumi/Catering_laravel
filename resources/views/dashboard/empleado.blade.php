<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Empleado - Catering Soft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f5f0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #fff;
            padding: 2rem 1rem;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            height: 100vh;
            transition: transform 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar .brand {
            text-align: center;
        }

        .sidebar .brand img {
            height: 60px;
        }

        .sidebar h4 {
            color: #d4af37;
            margin-top: 10px;
        }

        .side-menu {
            list-style: none;
            padding: 0;
            margin-top: 2rem;
        }

        .side-menu li {
            margin: 15px 0;
        }

        .side-menu a {
            text-decoration: none;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 10px;
            transition: 0.2s ease;
        }

        .side-menu a:hover,
        .side-menu .active a {
            background-color: #f5f0da;
            color: #d4af37;
            font-weight: bold;
        }

        .logout-button {
            background-color: #f5f0da;
            color: #d4af37;
            padding: 10px 15px;
            border-radius: 10px;
            display: inline-block;
            font-weight: 600;
            border: none;
            width: 100%;
        }

        .logout-button:hover {
            background-color: #d4af37;
            color: #fff;
        }

        #content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        #content.expanded {
            margin-left: 0;
        }

        .navbar {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar .bx-menu {
            font-size: 1.5rem;
            cursor: pointer;
            color: #d4af37;
        }

        .text-gold {
            color: #d4af37;
        }

        .btn-gold {
            background-color: #d4af37;
            color: white;
        }

        .btn-gold:hover {
            background-color: #b9972d;
        }

        .table thead {
            background-color: #f5f0da;
            color: #333;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            #content {
                margin-left: 0;
            }

            #content.expanded {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div>
            <!-- Branding -->
            <div class="brand">
                <img src="{{ asset('img/home/logp.png') }}" alt="Logo de la Empresa">
                <h4>Empleado</h4>
            </div>

            <!-- Menú -->
            <ul class="side-menu">
                <li class="active">
                    <a href="/dashboard"><i class="bx bx-home"></i>Inicio</a>
                </li>
                <li>
            </ul>
        </div>

        <!-- Botón de logout -->
        <div class="text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="bx bx-log-out"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </div>

    <div id="content">
        <nav class="navbar mb-4">
            <i class="bx bx-menu" id="toggle-sidebar"></i>
            <span class="fs-5 fw-bold text-gold">Dashboard Empleado</span>
        </nav>

        <main>
            <h2 class="text-gold text-center mb-4">Tareas Asignadas</h2>

            <!-- Filtros -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-3">
                    <label for="fecha" class="form-label fw-semibold">Fecha</label>
                    <input type="date" id="fecha" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="estado" class="form-label fw-semibold">Estado</label>
                    <select id="estado" class="form-select">
                        <option value="">Todos</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="en progreso">En progreso</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="evento" class="form-label fw-semibold">Evento</label>
                    <input type="text" id="evento" class="form-control" placeholder="Buscar evento...">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button onclick="filtrarTareas()" class="btn btn-gold w-100">Filtrar</button>
                </div>
            </div>

            <!-- Tabla de tareas -->
            <div class="table-responsive bg-white rounded shadow p-3">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>Evento</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tareasAsignadas->links() }}
            </div>
        </main>
    </div>

    <!-- Script para filtros -->
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('content').classList.toggle('expanded');
        });

        async function filtrarTareas() {
            let fecha = document.getElementById('fecha').value;
            let estado = document.getElementById('estado').value;
            let evento = document.getElementById('evento').value;

            let query = new URLSearchParams({
                fecha: fecha,
                estado: estado,
                evento: evento
            }).toString();

            try {
                let response = await fetch(`/empleado/filtro?${query}`);
                let data = await response.json();

                let tbody = document.getElementById('tabla-tareas-body');
                tbody.innerHTML = '';

                if (data.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No hay tareas para estos filtros.</td></tr>';
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
                            <td class="text-center">
                                <a href="/tareas/${tarea.id}" class="btn btn-primary btn-sm">Ver</a>
                            </td>
                        </tr>
                    `;
                });
            } catch (error) {
                console.error('Error al filtrar tareas:', error);
            }
        }
    </script>
</body>

</html>
