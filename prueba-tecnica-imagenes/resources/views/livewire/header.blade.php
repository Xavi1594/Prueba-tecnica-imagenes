<header class="bg-cover bg-center h-[450px] flex items-center justify-center relative" style="background-image: url('{{ asset('storage/images/pexels-life-of-pix-8047.jpg') }}');">

    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 text-center px-6 sm:px-12">
        <h1 class="text-4xl sm:text-5xl font-bold mb-4 animate-slide-up text-white">Denuncia desperfectos en tu ciudad</h1>
        <p class="text-lg sm:text-2xl animate-slide-up delay-200 text-white">Sube imágenes de los desperfectos de tu ciudad, indicando la calle, para que sean arreglados.</p>
    </div>
    <div class="absolute bottom-6 right-6 sm:right-12 flex space-x-6">
        <a href="{{ route('images.index') }}" class="text-white text-lg font-medium transition duration-300 hover:text-blue-400 {{ $currentRoute === 'images.index' ? 'border-b-2 border-white' : '' }} sm:text-xl lg:text-2xl">Home</a>
        <a href="{{ route('images.create') }}" class="text-white text-lg font-medium transition duration-300 hover:text-blue-400 {{ $currentRoute === 'images.create' ? 'border-b-2 border-white' : '' }} sm:text-xl lg:text-2xl">Crear Imagen</a>
    </div>
</header>
