# 🍽️ CateringSoft

**CateringSoft** es un software diseñado para **empresas de catering**, proporcionando una herramienta eficiente para **gestionar eventos, administrar empleados y controlar insumos** necesarios para cada servicio.

---

## 🚀 Tecnologías Utilizadas

- **PHP:** 8.2.12  
- **Laravel:** 5.13.0  

---

## ⚙️ Configuración del Proyecto

### 📥 1. Clonar el Repositorio
Ejecuta el siguiente comando en tu terminal:
```sh
git clone https://github.com/thjumi/Catering_laravel.git
```
Accede a la carpeta del proyecto:
```sh
cd Catering_laravel
```

### 📦 2. Instalar Dependencias
Asegúrate de tener **Composer** instalado y luego ejecuta:
```sh
composer install
```

### 🔑 3. Configurar la Clave de la Aplicación
Genera la clave de la aplicación con:
```sh
php artisan key:generate
```

### ⚙️ 4. Configurar el Entorno (`.env`)
1. Copia el archivo de configuración de ejemplo:
   ```sh
   cp .env.example .env
   ```
2. Abre el archivo `.env` y ajusta los valores de la base de datos según tu configuración.

### 🛠️ 5. Configurar la Base de Datos
1. Crea una base de datos en **MySQL** (o el gestor que estés usando).
2. En el archivo `.env`, actualiza la configuración de conexión a la base de datos.
3. Ejecuta las migraciones para crear las tablas:
   ```sh
   php artisan migrate
   ```
4. (Opcional) Pobla la base de datos con datos de prueba:
   ```sh
   php artisan db:seed
   ```

### ⚡ 6. Ejecutar el Servidor
Para iniciar el proyecto, usa:
```sh
php artisan serve
```
Esto iniciará un servidor local donde podrás acceder a la aplicación desde tu navegador en:
📌 `http://127.0.0.1:8000`

---

## 📌 Notas Importantes
Asegúrate de tener instalado **Composer** y un servidor local como **XAMPP, Laragon o Laravel Valet** antes de comenzar.  
---
