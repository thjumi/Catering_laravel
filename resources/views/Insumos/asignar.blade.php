<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Insumo - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdfbf4;
            font-family: 'Segoe UI', sans-serif;
        }

        .title-gold {
            color: #d4af37;
        }

        .form-card {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
        }

        .btn-gold {
            background-color: #d4af37;
            color: white;
            font-weight: 500;
        }

        .btn-gold:hover {
            background-color: #b8962f;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="col-lg-6 mx-auto">
        <div class="form-card">
            <h2 class="mb-4 title-gold text-center">Asignar Insumo a Evento</h2>

            <form action="{{ route('insumos.asignar', ['insumoId' => $insumo->id, 'eventoId' => $evento->id]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="insumo" class="form-label fw-semibold">Insumo:</label>
                    <input type="text" class="form-control" id="insumo" value="{{ $insumo->nombre }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="evento" class="form-label fw-semibold">Evento:</label>
                    <input type="text" class="form-control" id="evento" value="{{ $evento->nombre }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label fw-semibold">Cantidad a Asignar:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" required min="1">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-gold px-4 py-2">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

