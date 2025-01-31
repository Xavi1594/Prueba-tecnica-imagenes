# 📌 Proyecto de Gestión de Imágenes

## 📑 Índice
1. [Introducción](#introduccion)
2. [Requisitos de Instalación](#requisitos-de-instalacion)
3. [Instalación y Configuración](#instalacion-y-configuracion)
4. [Ejecutar la Aplicación](#ejecutar-la-aplicacion)
5. [Arquitectura y Desarrollo](#arquitectura-y-desarrollo)
6. [Estrategia de Testing](#estrategia-de-testing)
7. [Ejecución de Tests](#ejecucion-de-tests)
8. [Capturas](#capturas)
9. [Conclusión](#conclusion)

---

## 📌 Introducción <a name="introduccion"></a>
# ¿Qué requisitos tiene que cumplir la aplicación como usuario?
● Como usuario será necesario poder ver una lista de mis
imágenes (imagen y un título)
● Como usuario será necesario poder añadir imágenes a una
base de datos
● Como usuario será necesario poder eliminar una imágen
● Como usuario será necesario poder editar una imagen existente
# ¿Qué requisitos técnicos pedimos y son imprescindibles?
● Buenas prácticas de desarrollo de Software
● Test (TDD)
● SOLID
● Git y commits

---

## 🔧 Requisitos de Instalación <a name="requisitos-de-instalacion"></a>

Antes de instalar el proyecto, asegúrate de tener lo siguiente:
- PHP 8.1+
- Composer
- MySQL o MariaDB
- Node.js y npm
- Laravel 10+

---

## 📥 Instalación y Configuración <a name="instalacion-y-configuracion"></a>

1. Clona el repositorio:
   ```sh
   git clone https://github.com/tu-usuario/tu-repositorio.git
   cd tu-repositorio
   ```
2. Instala las dependencias de Laravel:
   ```sh
   composer install
   ```
3. Instala las dependencias de Node.js:
   ```sh
   npm install && npm run build
   ```
4. Crea el archivo `.env` y configura la base de datos:
   ```sh
   cp .env.example .env
   ```
   Luego, edita el archivo `.env` para ajustar los datos de conexión a MySQL.

5. Ejecuta las migraciones:
   ```sh
   php artisan migrate --seed
   ```

---

🚀 Ejecutar la Aplicación 

Para iniciar el servidor de desarrollo:
   ```

cd prueba-tecnica-imagenes
php artisan serve

Para compilar los assets:

npm run dev
   ```

La aplicación estará disponible en http://localhost:8000.

## 🏗️ Arquitectura y Desarrollo <a name="arquitectura-y-desarrollo"></a>

El proyecto sigue una **arquitectura monolítica** con Laravel y Livewire para manejar la interacción dinámica sin necesidad de JavaScript adicional. Se ha utilizado **Tailwind CSS** para la interfaz y **MySQL** como base de datos.

Inicialmente, comencé utilizando **Test-Driven Development (TDD)** en el backend, lo que ayudó a definir bien las funcionalidades antes de implementarlas. Sin embargo, debido a restricciones de tiempo, el desarrollo de la interfaz y algunas partes del backend se completaron primero y luego se cubrieron con tests.

### 🛠️ Tecnologías utilizadas
- **Laravel Livewire** → Para componentes interactivos sin necesidad de JavaScript adicional.
- **Tailwind CSS** → Para el diseño visual rápido y responsive.
- **MySQL** → Base de datos relacional.
- **Vite** → Para la compilación y carga rápida de assets.

---

## 🧪 Estrategia de Testing <a name="estrategia-de-testing"></a>

El proyecto incluye **tests unitarios y de integración**:
- **TDD en el backend**: Se escribieron tests primero para el controlador de imágenes.
- **Tests posteriores para el frontend**: Para asegurar que los componentes Blade muestren los botones necesarios y que las vistas sean correctas.

Se han probado:
1. **Modelo Image** → Validación de datos y relaciones.
2. **Controlador ImageController** → Métodos de CRUD.
3. **Componente ImageCard** → Asegurar que los botones de editar y borrar siempre están presentes.

---
![captura movil 2](https://github.com/user-attachments/assets/539b41da-1c03-4fc0-877c-ba8382be44ec)
![captura form](https://github.com/user-attachments/assets/24f1027b-5059-4608-93b6-7a18aa1a5c76)

## 🏃‍♂️ Ejecución de Tests <a name="ejecucion-de-tests"></a>

Para ejecutar los tests:
```sh
php artisan test
```
Para correr un test específico:
```sh
php artisan test --filter=ImageCardTest
```
Si usas PHPUnit directamente:
```sh
vendor/bin/phpunit
```
## 📸 Capturas <a name="capturas"></a>
![test-fallidos-factoria](https://github.com/user-attachments/assets/a8b8b73a-5a0d-40c8-98c0-65783d3ea19f)
![test correctos](https://github.com/user-attachments/assets/99613bc8-8877-4fa1-a1fd-50cc838872d9)

---





## 🎯 Conclusión <a name="conclusion"></a>

El desarrollo comenzó con **TDD en el backend**, asegurando que la API funcionara correctamente antes de implementar la interfaz. Sin embargo, la falta de tiempo hizo que algunas partes del frontend se desarrollaran primero y luego se probaran con test de integración.



