<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia y actúa </title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">

    <livewire:header />

    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} Gestión de Imágenes | Todos los derechos reservados.</p>
    </footer>

    @livewireScripts
</body>
</html>
