<div class="container mx-auto p-4">
    @if ($images->isEmpty())
        <p class="text-gray-500 text-center text-sm">No hay imágenes disponibles.</p>
    @else
        <div class="flex flex-wrap justify-center gap-4">
            @foreach($images as $image)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <a href="{{ route('images.show', $image->id) }}">
                        <livewire:image-card :image="$image" :key="$image->id" />
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            <div class="inline-flex items-center space-x-4">
                @if($images->onFirstPage())
                    <span class="text-gray-400 cursor-not-allowed">&laquo;</span>
                @else
                    <a href="{{ $images->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 hover:text-gray-900">&laquo;</a>
                @endif

                @foreach ($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium {{ $page == $images->currentPage() ? 'text-white bg-blue-600 rounded-md' : 'text-gray-700 bg-white hover:bg-gray-100 hover:text-gray-900 border border-gray-300' }}">{{ $page }}</a>
                @endforeach

                @if($images->hasMorePages())
                    <a href="{{ $images->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 hover:text-gray-900">&raquo;</a>
                @else
                    <span class="text-gray-400 cursor-not-allowed">&raquo;</span>
                @endif
            </div>
        </div>
    @endif
</div>

@if ($selectedImage)
    <div class="container mx-auto p-4 mt-6">
        <h1 class="text-base font-bold mb-3 text-center">Detalles de la Imagen</h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full h-[500px] flex flex-col">
            <img src="{{ asset('storage/' . $selectedImage->url_img) }}" alt="Imagen" class="w-full h-48 object-contain">

            <div class="p-4 flex flex-col justify-between flex-grow">
                <h2 class="text-lg font-semibold text-linkedin-blue">{{ $selectedImage->title }}</h2>
                <p class="text-gray-600 text-sm truncate">{{ $selectedImage->description }}</p>

                <div class="flex justify-end mt-3 space-x-2">
                    <a href="{{ route('images.edit', $selectedImage->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition duration-300">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('images.destroy', $selectedImage->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md text-sm hover:bg-red-600 transition duration-300">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
