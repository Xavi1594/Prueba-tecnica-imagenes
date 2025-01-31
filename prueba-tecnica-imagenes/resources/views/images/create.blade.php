@extends('layouts.app')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-96 lg:w-1/2 xl:w-1/3 mx-auto">
    <h2 class="text-lg font-semibold text-dark-blue mb-4 text-center">¿Qué quieres denunciar?</h2>

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="imageForm">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-dark-blue">Título</label>
            <input type="text" name="title" id="title" class="form-control w-full" placeholder="Introduce el título de la imagen" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-dark-blue">Descripción</label>
            <textarea name="description" id="description" class="form-control w-full" placeholder="Añade una descripción de la imagen" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-dark-blue">Imagen</label>

            <div class="relative">
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control w-full mb-2 text-sm text-gray-700 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:bg-gray-100 file:text-gray-800 file:cursor-pointer hover:file:bg-gray-200 focus:outline-none"
                    accept="image/*"
                    onchange="previewImage(event)"
                    required
                >
            </div>

            <p class="text-xs text-gray-500">Solo se permiten imágenes en los formatos: JPEG, PNG, JPG, GIF, AVIF (máximo 2MB).</p>
            <p id="imageError" class="text-red-500 text-sm hidden">Por favor, sube una imagen válida (JPEG, PNG, JPG, GIF, AVIF) y que no exceda los 2MB.</p>

            <img id="preview" class="w-full h-48 object-cover rounded-lg mt-4 hidden" alt="Vista previa de la imagen">
        </div>

        <div class="flex justify-end space-x-4 mt-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-green-700 transition duration-300">
                Crear Imagen
            </button>
            <a href="{{ route('images.index') }}" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-red-700 transition duration-300">
                Cancelar
            </a>
        </div>
    </form>

    <div id="confirmationMessage" class="hidden bg-green-600 text-white p-4 rounded-lg text-center mt-4">
        ¡Imagen creada con éxito!
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('imageForm').addEventListener('submit', function(event) {
        let isValid = true;
        const fileInput = document.getElementById('image');
        const imageError = document.getElementById('imageError');

        const file = fileInput.files[0];
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/avif'];

        if (file && !validImageTypes.includes(file.type)) {
            imageError.classList.remove('hidden');
            isValid = false;
        } else {
            imageError.classList.add('hidden');
        }

        if (file && file.size > 2 * 1024 * 1024) {
            imageError.classList.remove('hidden');
            imageError.textContent = 'La imagen no puede exceder los 2MB.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        } else {
            event.preventDefault();
            document.getElementById('confirmationMessage').classList.remove('hidden');

            setTimeout(function() {
                document.getElementById('confirmationMessage').classList.add('hidden');
                document.getElementById('imageForm').submit();
            }, 1000);
        }
    });
</script>

@endsection
