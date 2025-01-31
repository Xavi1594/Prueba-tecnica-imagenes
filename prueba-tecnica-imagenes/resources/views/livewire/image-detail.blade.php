<div class="container mx-auto p-6 sm:p-8 bg-gray-100 rounded-lg shadow-lg max-w-3xl">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6 sm:mb-8">Detalles de la Imagen</h1>

    @if ($image)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full flex flex-col" id="image-{{ $image->id }}">
            <img src="{{ asset('storage/' . $image->url_img) }}" alt="Imagen" class="w-full h-48 sm:h-64 object-contain transition-transform duration-500 ease-in-out hover:scale-110">

            <div class="p-4 sm:p-8 flex flex-col justify-between flex-grow space-y-4 sm:space-y-6 text-center">
                <h2 class="text-xl sm:text-2xl font-semibold text-indigo-700">{{ $image->title }}</h2>
                <p class="text-gray-700 text-sm sm:text-base line-clamp-4 mx-4">{{ $image->description }}</p>

                <div class="flex flex-col sm:flex-row sm:justify-center gap-4 sm:gap-6 mt-6 sm:mt-8 w-full">
                    <a href="{{ route('images.edit', $image->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white px-6 py-3 rounded-lg text-sm font-medium shadow-md hover:shadow-lg transition duration-200 w-full sm:w-auto">
                        Editar
                    </a>

                    <form id="delete-form-{{ $image->id }}" method="POST" action="{{ route('images.destroy', $image->id) }}" class="inline-block w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="{{ $confirmScript }}" class="bg-red-600 hover:bg-red-500 text-white px-6 py-3 rounded-lg text-sm font-medium shadow-md hover:shadow-lg transition duration-200 w-full sm:w-auto">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
