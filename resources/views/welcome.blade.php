<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS y Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>CateringSoft</title>
</head>
<body class="bg-[#f4f0ea] font-['Playfair_Display']">
  <!-- Encabezado -->
  <header class="h-screen bg-cover bg-center relative" style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.4)), url('{{ asset('img/home/1.jpg') }}')">
    <div class="absolute inset-x-0 top-0">
      <div class="container mx-auto flex justify-between items-center p-6">
        <p class="text-white text-3xl font-extrabold tracking-wider">CateringSoft</p>
        
        <!-- Menú móvil con Alpine.js -->
        <div class="relative md:hidden" x-data="{ open: false }">
          <button @click="open = !open" class="space-y-1 focus:outline-none">
            <span class="block w-8 h-1 bg-[#ff5900c9]"></span>
            <span class="block w-8 h-1 bg-[#ff5900c9]"></span>
            <span class="block w-8 h-1 bg-[#ff5900c9]"></span>
          </button>
          <div x-show="open" x-transition class="absolute right-0 mt-2 w-40 bg-black shadow-lg rounded-lg py-2 z-10">
            <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:text-[#ff6106]">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:text-[#ff6106]">Registro</a>
          </div>
        </div>
        <!-- Menú para pantallas medianas y superiores -->
        <nav class="hidden md:flex">
          <ul class="flex space-x-6">
            <li>
              <a href="{{ route('login') }}" class="text-white hover:text-[#ff6106]">
                Iniciar sesión
              </a>
            </li>
            <li>
              <a href="{{ route('register') }}" class="text-white hover:text-[#ff6106]">
                Registro
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="container mx-auto h-full flex items-center justify-start p-8">
      <div>
        <h1 class="text-white text-6xl md:text-8xl font-extrabold leading-tight animate-fade-in">
          CateringSoft
        </h1>
        <h2 class="text-white text-2xl md:text-4xl mt-4 animate-fade-in">
        Software que optimiza tu Negocio
        </h2>
      </div>
    </div>
  </header>

  <!-- Tarjetas de Servicios -->
  <section class="my-12">
    <div class="container mx-auto flex flex-wrap justify-center gap-8">
      <!-- Tarjeta 1 -->
      <article class="max-w-sm bg-white rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
        <img src="{{ asset('img/home/2.jpg') }}" alt="Organización de empleados" class="w-full h-48 rounded-t-lg object-cover">
        <div class="p-5">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Organiza tu Equipo</h2>
          <p class="text-sm text-gray-600">
            Facilita la asignación y gestión de tareas para tu equipo, asegurando una organización eficiente y optimizando el tiempo en cada evento.
          </p>
          <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
            Ver más
          </a>
        </div>
      </article>
      <!-- Tarjeta 2 -->
      <article class="max-w-sm bg-white rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
        <img src="{{ asset('img/home/3.jpg') }}" alt="Organización de menú" class="w-full h-48 rounded-t-lg object-cover">
        <div class="p-5">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Organiza tus eventos</h2>
          <p class="text-sm text-gray-600">
            Crea una experiencia única para tus eventos con nuestro servicio de gestión.
          </p>
          <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
            Ver más
          </a>
        </div>
      </article>
      <!-- Tarjeta 3 -->
      <article class="max-w-sm bg-white rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
        <img src="{{ asset('img/home/4.jpg') }}" alt="Gestión de inventario" class="w-full h-48 rounded-t-lg object-cover">
        <div class="p-5">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Gestiona tu Inventario</h2>
          <p class="text-sm text-gray-600">
            Administra eficientemente el inventario de recursos y materiales para eventos, garantizando que siempre tengas lo necesario.
          </p>
          <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
            Ver más
          </a>
        </div>
      </article>
    </div>
  </section>

  <!-- Testimonios -->
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold text-center mb-8">Qué dicen nuestros clientes</h2>
      <div class="flex flex-wrap justify-center gap-6">
        <blockquote class="bg-white p-6 rounded-lg shadow-md max-w-sm text-center">
          <p class="text-gray-600 italic">"CateringSoft ha transformado la forma en que gestionamos nuestros eventos. Es increíblemente fácil de usar."</p>
          <cite class="mt-4 block font-semibold text-gray-800">- Yeison García</cite>
        </blockquote>
        <blockquote class="bg-white p-6 rounded-lg shadow-md max-w-sm text-center">
          <p class="text-gray-600 italic">"Gracias a este software, hemos duplicado nuestra eficiencia y nuestros clientes están más satisfechos que nunca."</p>
          <cite class="mt-4 block font-semibold text-gray-800">- Valentina Mora</cite>
        </blockquote>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="bg-white text-black text-center py-4">
    <p>&copy; {{ date('Y') }} CateringSoft. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
