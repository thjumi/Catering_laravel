<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Iconos de Bootstrap (para los íconos) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>CateringSoft</title>
  <style>

    body {
      background-color: #000;
      color: #d2b48c;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    a {
      text-decoration: none;
      color: inherit;
    }
    
    a:hover {
      color: #b8860b;
    }
    
    h1, h2, h3, h4, h5 {
      font-weight: bold;
    }
    
    .bg-dark-custom {
      background-color: #1c1c1c; 
    }
    
    /* Hero / Slider */
    .carousel-item {
      height: 90vh;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      position: relative;
    }
    
    .carousel-caption {
      bottom: 25%;
    }
    
    .carousel-caption h1 {
      font-size: 3rem;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    }
    
    /* Sección de características */
    .feature-box {
      transition: all 0.3s ease-in-out;
      background: #1c1c1c;
      color: #d2b48c;
      border-radius: 10px;
      padding: 20px;
      height: 100%;
    }
    
    .feature-box:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(210, 180, 140, 0.2);
    }
    
    .icon-section i {
      font-size: 3rem;
      color: #d2b48c;
      transition: transform 0.3s;
    }
    
    .icon-section:hover i {
      transform: rotate(15deg);
    }
    
    /* Sección Menú */
    .menu-item {
      background: #1c1c1c;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      transition: all 0.3s ease-in-out;
    }
    
    .menu-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(210, 180, 140, 0.1);
    }
    
    /* Sección Galería */
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
    }
    
    .gallery-item img {
      width: 100%;
      transition: transform 0.4s;
    }
    
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    
    /* Sección Noticias/Eventos */
    .event-card {
      background: #1c1c1c;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      transition: all 0.3s ease-in-out;
    }
    
    .event-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(210, 180, 140, 0.1);
    }
    
    /* Sección Testimonios */
    .testimonial {
      background: #1c1c1c;
      border-radius: 10px;
      padding: 20px;
      margin: 10px;
      text-align: center;
    }
    
    .testimonial img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
    
    /* Sección Contacto */
    .contact-form label {
      color: #d2b48c;
      font-weight: bold;
    }
    
    .contact-form .form-control {
      background-color: #000;
      color: #d2b48c;
      border: 1px solid #d2b48c;
    }
    
    .contact-form .form-control:focus {
      box-shadow: 0 0 5px #d2b48c;
    }
    
    /* Botones personalizados */
    .btn-custom {
      background-color: #c6996f;
      color: white;
      border-radius: 30px;
      padding: 12px 30px;
      transition: 0.3s;
    }
    
    .btn-custom:hover {
      background-color: #5d4037;
      color: white;
    }
    
    /* Footer */
    footer {
      background-color: #1c1c1c;
      color: #d2b48c;
    }
  </style>
</head>

<body>

  <div id="hero" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#hero" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#hero" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('{{ asset('img/home/1.png') }}');">
        <div class="carousel-caption">
          <h1>CATERINGSOFT</h1>
          <h3>Empieza Ahora</h3>
          <p class="lead">Donde la tecnología y el sabor se encuentran para llevar tu negocio al siguiente nivel</p>
          <a href="{{ route('login') }}" class="btn btn-custom btn-lg">Iniciar Sesión</a>
          <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg ms-3">Registrarse</a>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('{{ asset('img/home/3.png') }}');">
        <div class="carousel-caption">
          <h1>PLANIFICA TUS EVENTOS</h1>
          <p class="lead">La herramienta perfecta para tu catering</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('{{ asset('img/home/2.png') }}');">
        <div class="carousel-caption">
          <h1>GESTIONA TUS EMPLEADOS</h1>
          <p class="lead">Asigna empleados a tus eventos</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Sección de características -->
  <section id="caracteristicas" class="container py-5 text-center">
    <h2 class="mb-4">¿Por qué elegir CateringSoft?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-section mb-3"><i class="bi bi-people"></i></div>
          <h4>Organiza tu equipo</h4>
          <p>Facilita la gestión de tareas y optimiza la eficiencia de tu negocio.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-section mb-3"><i class="bi bi-calendar-event"></i></div>
          <h4>Planifica eventos</h4>
          <p>Diseña experiencias únicas y gestiona cada detalle de manera efectiva.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-box">
          <div class="icon-section mb-3"><i class="bi bi-box-seam"></i></div>
          <h4>Control de inventario</h4>
          <p>Asegura que siempre tengas los insumos necesarios para tus eventos.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección Galería -->
  <section id="galeria" class="container py-5">
    <h2 class="text-center mb-5">Eventos Con CateringSoft</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="gallery-item">
        <img src="{{ asset('img/home/evento1.jpg') }}" alt="Platillo 1">
        </div>
      </div>
      <div class="col-md-4">
        <div class="gallery-item">
        <img src="{{ asset('img/home/evento2.jpg') }}" alt="Platillo 2">
        </div>
      </div>
      <div class="col-md-4">
        <div class="gallery-item">
        <img src="{{ asset('img/home/evento3.jpg') }}" alt="Platillo 3">
        </div>
      </div>
    </div>
  </section>

  <!-- Sección Noticias / Eventos -->
  <section id="eventos" class="py-5 bg-dark-custom">
    <div class="container">
      <h2 class="text-center mb-5">Últimas Actualizaciones</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="event-card">
            <h4>Planifica tus tareas de forma más sencilla</h4>
            <p>Disponible a partir del 17 de Septiembre 2025</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="event-card">
            <h4>Nuevos subroles para tus empleados</h4>
            <p>Disponible a partir del 1 de Octubre 2025</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="event-card">
            <h4>Agrega insumos a tus eventos eficientemente</h4>
            <p>Disponible a partir del 14 de Febrero 2026</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección Testimonios -->
  <section id="testimonios" class="container py-5">
    <h2 class="text-center mb-5">Lo Que Dicen Nuestros Clientes</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="testimonial">
        <img src="{{ asset('img/home/sara.jpg') }}" alt="Platillo 3">
          <p class="mt-3">“La plataforma de CateringSoft nos facilitó la organización de eventos.”</p>
          <h5 class="fw-bold">- Bivian Cruz</h5>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial">
        <img src="{{ asset('img/home/yef.jpg') }}" alt="Platillo 3">
          <p class="mt-3">“El control de inventario es impresionante, nos ahorra tiempo y dinero.”</p>
          <h5 class="fw-bold">- Yeferson Oviedo</h5>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial">
        <img src="{{ asset('img/home/biv.jpg') }}" alt="Platillo 3">
          <p class="mt-3">“Nunca había sido tan fácil planificar y promocionar nuestros menús.”</p>
          <h5 class="fw-bold">- Sara Garzón</h5>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección Contacto -->
  <section id="contacto" class="py-5 bg-dark-custom">
    <div class="container">
      <h2 class="text-center mb-5">¿Tienes dudas? Contáctanos</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
          <h4 class="fw-bold">Información de Contacto</h4>
          <p><i class="bi bi-telephone-fill"></i> +57 313 3702490</p>
          <p><i class="bi bi-envelope-fill"></i> info@cateringsoft.com</p>
          <p><i class="bi bi-geo-alt-fill"></i> Av ciudad de cali #45</p>
          <p class="mt-3">Horario de Atención: Lunes a Viernes de 9:00 am a 6:00 pm</p>
        </div>
        <div class="col-md-6">
          <form class="contact-form">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico">
            </div>
            <div class="mb-3">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje"></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 text-center">
    <p class="mb-0">&copy; 2025 CateringSoft. Todos los derechos reservados.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
