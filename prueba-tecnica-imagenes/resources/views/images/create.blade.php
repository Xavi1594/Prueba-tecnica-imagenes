@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Subir Imagen</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" required onchange="previewImage(event)">
                </div>
                <div class="mb-3">
                    <label for="preview" class="form-label">Vista Previa</label>
                    <img id="preview" src="#" alt="Vista Previa" style="max-width: 100%; display: none;" />
                </div>
                <button type="submit" class="btn btn-primary">Subir</button>
            </form>
        </div>
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
</script>
@endsection
