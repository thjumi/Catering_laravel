<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de Administración - Catering Soft</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
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
		}

		.sidebar h2 {
			font-size: 1.5rem;
			font-weight: 700;
			margin-bottom: 2rem;
			text-align: center;
			color: #026b29;
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
			text-decoration: none;
		}

		.sidebar a:hover,
		.sidebar a.active {
			background-color: #f5f0da;
			color: #d4af37;
			font-weight: 600;
		}

		.logout-button {
			display: flex;
			align-items: center;
			gap: 10px;
			padding: 10px 15px;
			margin-top: 2rem;
			border-radius: 10px;
			background-color: #f5f0da;
			color: #d4af37;
			font-weight: 600;
			text-decoration: none;
			transition: background 0.2s ease;
		}

		.logout-button:hover {
			background-color: #d4af37;
			color: white;
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
		}

		.main h1 {
			font-size: 2rem;
			color: #026b29;
			margin-bottom: 1.5rem;
			text-align: center;
		}

		.grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 1.5rem;
		}

		.card {
			background-color: #fff;
			padding: 1.5rem;
			border-radius: 12px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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

		.actions a {
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 10px;
			background: #84b200;
			color: #fff;
			padding: 1rem;
			border-radius: 12px;
			text-decoration: none;
			font-weight: 600;
			transition: all 0.2s ease;
		}

		.actions a:hover {
			background: #b9972d;
			transform: scale(1.03);
		}

		@media (max-width: 768px) {
			.sidebar {
				width: 200px;
			}

			.main {
				margin-left: 200px;
			}
		}

		@media (max-width: 576px) {
			.sidebar {
				position: relative;
				width: 100%;
				height: auto;
				flex-direction: row;
				justify-content: space-around;
				padding: 1rem;
			}

			.main {
				margin-left: 0;
				margin-top: 2rem;
			}
		}
	</style>
</head>

<body>
	<!-- Sidebar -->
	<div class="sidebar">
		<div>
			<h2>Catering Soft</h2>
			<a href="{{ route('empleados.index') }}"
				class="{{ request()->routeIs('empleados.index') ? 'active' : '' }}">
				<i class='bx bx-user'></i> Empleados
			</a>
			<a href="{{ route('eventos.index') }}" class="{{ request()->routeIs('eventos.index') ? 'active' : '' }}">
				<i class='bx bx-calendar'></i> Eventos
			</a>
			<a href="{{ route('tareas.index') }}" class="{{ request()->routeIs('tareas.index') ? 'active' : '' }}">
				<i class='bx bx-task'></i> Tareas
			</a>
			<a href="{{ route('insumos.index') }}" class="{{ request()->routeIs('insumos.index') ? 'active' : '' }}">
				<i class='bx bx-box'></i> Insumos
			</a>
			<a href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
				class="logout-button">
				<i class='bx bx-log-out'></i> Cerrar Sesión
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
		<div class="logo">
			<img src="{{ asset('img/home/logp.png') }}" alt="Logo de la Empresa">
		</div>
	</div>

	<!-- Main -->
	<div class="main">
		<h1>Bienvenido Administrador</h1>

		<!-- Estadísticas -->
		<div class="grid">
			<div class="card">
				<h3>Total de empleados</h3>
				<p>{{ $totalEmpleados }}</p>
			</div>
			<div class="card">
				<h3>Total de eventos</h3>
				<p>{{ $totalEventos }}</p>
			</div>
			<div class="card">
				<h3>Total de tareas</h3>
				<p>{{ $totalTareas }}</p>
			</div>
			<div class="card">
				<h3>Tareas pendientes</h3>
				<p>{{ $tareasPendientes }}</p>
			</div>
			<div class="card">
				<h3>Total de insumos</h3>
				<p>{{ $totalInsumos }}</p>
			</div>
		</div>


		<!-- Acciones -->
		<div class="grid actions" style="margin-top: 40px;">
			<a href="{{ route('empleados.index') }}"><i class='bx bx-user'></i> Gestionar Empleados</a>
			<a href="{{ route('eventos.index') }}"><i class='bx bx-calendar'></i> Gestionar Eventos</a>
			<a href="{{ route('tareas.index') }}"><i class='bx bx-task'></i> Gestionar Tareas</a>
			<a href="{{ route('insumos.index') }}"><i class='bx bx-box'></i> Ver Insumos</a>
		</div>

		
		<!-- Actividad reciente, eventos y notificaciones -->
		<div class="grid" style="margin-top: 40px;">
			<!-- Actividad reciente -->
			<div class="card">
				<h3>Actividad reciente</h3>
				@if(count($actividadReciente) > 0)
					<ul style="list-style: none; padding-left: 0; text-align: left;">
						@foreach($actividadReciente as $actividad)
							<li>{{ $actividad }}</li>
						@endforeach
					</ul>
				@else
					<p>No hay actividad reciente.</p>
				@endif
			</div>

			<!-- Próximos eventos -->
			<div class="card">
				<h3>Próximos eventos</h3>
				@if($proximosEventos->count())
					<ul style="list-style: none; padding-left: 0; text-align: left;">
						@foreach($proximosEventos as $evento)
							<li>{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m') }} - {{ $evento->nombre }}</li>
						@endforeach
					</ul>
				@else
					<p>No hay eventos próximos.</p>
				@endif
			</div>

			<!-- Notificaciones -->
			<div class="card">
				<h3>Notificaciones</h3>
				@foreach($notificaciones as $noti)
					<p>{{ $noti }}</p>
				@endforeach
			</div>

			<!-- Empleado del mes -->
			<div class="card">
				<h3>Empleado del mes</h3>
				@if($empleadoDelMes)
					<p>🎖️ {{ $empleadoDelMes->name }}</p>
				@else
					<p>No disponible</p>
				@endif
			</div>
		</div>
		
</body>

</html>