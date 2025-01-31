@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-lg font-semibold text-center mb-4 text-dark-blue">Editar Imagen</h2>
    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto bg-white shadow-lg rounded-lg p-6">
        <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data" id="imageForm">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-dark-blue">Título</label>
                <input
                    type="text"
                    class="form-control w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                    id="title"
                    name="title"
                    value="{{ $image->title }}"
                    required
                    maxlength="50"
                    placeholder="Introduce el título de la imagen"
                >
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-dark-blue">Descripción</label>
                <textarea
                    class="form-control w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                    id="description"
                    name="description"
                    rows="4"
                    maxlength="200"
                    placeholder="Añade una descripción de la imagen"
                >{{ $image->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-dark-blue">Imagen</label>
                <input
                    type="file"
                    class="form-control w-full text-sm text-gray-700 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:bg-gray-100 file:text-gray-800 file:cursor-pointer hover:file:bg-gray-200 focus:outline-none"
                    id="image"
                    name="image"
                    onchange="previewImage(event)"
                    accept="image/*"
                >
            </div>

            <div class="mb-4">
                <label for="preview" class="block text-sm font-medium text-dark-blue">Vista Previa</label>
                <img
                    id="preview"
                    src="{{ asset('storage/' . $image->url_img) }}"
                    alt="Vista Previa"
                    class="w-full h-48 object-contain rounded-md mt-4"
                />
            </div>

            <div class="flex justify-end space-x-4 mt-4">
                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-green-700 transition duration-300"
                >
                    Actualizar Imagen
                </button>
                <a
                    href="{{ route('images.index') }}"
                    class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-red-700 transition duration-300"
                >
                    Cancelar
                </a>
            </div>
        </form>

        <div id="confirmationMessage" class="hidden bg-green-600 text-white p-4 rounded-lg text-center mt-4">
            ¡Imagen editada con éxito!
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('imageForm').addEventListener('submit', function(event) {
        event.preventDefault();
        document.getElementById('confirmationMessage').classList.remove('hidden');

        setTimeout(function() {
            document.getElementById('confirmationMessage').classList.add('hidden');
            document.getElementById('imageForm').submit();
        }, 1000);
    });
</script>

@endsection
