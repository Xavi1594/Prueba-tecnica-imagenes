@if ($image)
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full h-full flex flex-col min-h-[300px]">
        <img src="{{ asset('storage/' . $image->url_img) }}" alt="Imagen" class="w-full h-48 object-contain">

        <div class="p-4 flex flex-col justify-between flex-grow">
            <h2 class="text-lg font-semibold text-linkedin-blue">{{ $image->title }}</h2>
            <p class="text-gray-600 text-sm truncate">{{ $image->description }}</p>

            <div class="flex justify-end mt-3 space-x-2">
                <a href="{{ route('images.edit', $image->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition duration-300">
                    Editar
                </a>

                <form id="delete-form-{{ $image->id }}" method="POST" action="{{ route('images.destroy', $image->id) }}" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="{{ $confirmScript }}" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm hover:bg-red-700 transition duration-300">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
