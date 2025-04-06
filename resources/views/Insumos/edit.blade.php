<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Insumos</title>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f5f0;
            font-family: 'Poppins', sans-serif;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            color: #026b29;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: #f7f5f0;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 2rem auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        thead {
            background: #f5f0da;
            color: #d4af37;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #d4af37;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }

        .empty-row {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h2>Lista de Insumos</h2>

    <div class="container">
        <div class="card">
            <h3>Insumos disponibles</h3>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Evento Asociado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->id }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td>{{ $insumo->descripcion ?? 'Sin descripción' }}</td>
                                <td>{{ $insumo->cantidad }}</td>
                                <td>{{ optional($insumos->eventos)->nombre ?? 'Sin evento' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-row">No hay insumos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
