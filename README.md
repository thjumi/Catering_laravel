# 🌟 CateringSoft

**CateringSoft** es una solución moderna e intuitiva para empresas de catering. Ofrece herramientas eficientes para la gestión de eventos, administración de personal y control de insumos necesarios en cada servicio.

---

## 🚀 Tecnologías utilizadas

| Tecnología     | Versión   |
|----------------|-----------|
| **PHP**        | 8.2.12    |
| **Composer**   | 2.8.5     |
| **Laravel**    | 5.13.0    |
| **XAMPP**      | 8.2.12    |
| **Workbench**  | 8.0.41    |

---

## 🛠️ Guía de instalación y configuración

### 📁 1. Crear carpeta del proyecto

Crea una carpeta donde se almacenará el proyecto.  
> 💡 Si no tienes PHP instalado, consulta la guía: **"Instalación de PHP y Laravel en Windows"**.

---

### 🔄 2. Clonar el repositorio

Abre **Git Bash** en la carpeta recién creada y ejecuta:

```bash
git clone https://github.com/thjumi/Catering_laravel.git
cd Catering_laravel
```

---

### 📦 3. Instalar dependencias PHP

Asegúrate de tener **Composer** instalado. Luego ejecuta:

```bash
composer install
```

---

### 🔐 4. Generar clave de la aplicación

Laravel requiere una clave única para el cifrado de datos:

```bash
php artisan key:generate
```

---

### 📝 5. Configurar el archivo de entorno

Copia el archivo de ejemplo y configura los valores necesarios:

```bash
cp .env.example .env
```

Edita el archivo `.env` y ajusta los valores de la base de datos según tu configuración local.

---

### 🗃️ 6. Configurar la base de datos

1. Crea una base de datos en **MySQL** u otro gestor compatible.  
2. Verifica la configuración de conexión en `.env`.  
3. Ejecuta las migraciones para crear las tablas:

```bash
php artisan migrate
```

4. Población de datos con registros de prueba:

```bash
php artisan db:seed
```

---

### 🌐 7. Instalar dependencias frontend

Instala y compila los assets de frontend:

```bash
npm install
npm run dev
```

---

### 🚀 8. Iniciar el servidor

Levanta el servidor local con el siguiente comando:

```bash
php artisan serve
```

Abre tu navegador y accede a la aplicación en:  
👉 [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📬 Contacto

Para dudas o soporte, puedes escribir a:  
📧 **tuemail@ejemplo.com**
