<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Insumo</title>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Tu estilo incluido aquí */
        /* (Pega aquí el CSS que me pasaste, por brevedad lo omito en esta respuesta) */
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <img src="logo.png" alt="Logo">
            <h4>Admin Stock</h4>
        </div>
        <ul class="side-menu">
            <li class="active"><a href="#"><i class="bx bx-box"></i>Insumos</a></li>
            <li><a href="#"><i class="bx bx-calendar"></i>Eventos</a></li>
            <li><a href="#"><i class="bx bx-log-out"></i>Salir</a></li>
        </ul>
        <button class="logout-button">Cerrar Sesión</button>
    </div>

    <div id="content">
        <div class="navbar">
            <i class="bx bx-menu" onclick="toggleSidebar()"></i>
            <h2 class="text-gold">Editar Insumo</h2>
        </div>

        <div class="card" style="background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); max-width: 800px; margin: auto;">
            <form method="POST" action="/insumos/actualizar/{{ $insumo->id }}">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 1rem;">
                    <label for="nombre" class="text-gold">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $insumo->nombre }}" class="form-control" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="descripcion" class="text-gold">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">{{ $insumo->descripcion }}</textarea>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="cantidad" class="text-gold">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" value="{{ $insumo->cantidad }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="stock" class="text-gold">Stock:</label>
                    <input type="number" id="stock" name="stock" value="{{ $insumo->stock }}" required class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="disponibilidad" class="text-gold">Disponible:</label>
                    <select id="disponibilidad" name="disponibilidad" class="form-control" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                        <option value="1" {{ $insumo->disponibilidad ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$insumo->disponibilidad ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="tipoInsumo" class="text-gold">Tipo de Insumo:</label>
                    <input type="text" id="tipoInsumo" name="tipoInsumo" value="{{ $insumo->tipoInsumo }}" required class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="lugarAlmacen" class="text-gold">Lugar de Almacenamiento:</label>
                    <input type="text" id="lugarAlmacen" name="lugarAlmacen" value="{{ $insumo->lugarAlmacen }}" required class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn-gold" style="padding: 10px 20px; border: none; border-radius: 8px;">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('hidden');
            document.getElementById('content').classList.toggle('expanded');
        }
    </script>
</body>
</html>
