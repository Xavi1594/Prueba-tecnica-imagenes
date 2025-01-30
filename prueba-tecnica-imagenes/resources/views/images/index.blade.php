@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Lista de Imágenes</h2>

        @if(session('success'))
            <div class="message-box success">
                <p>¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="message-box error">
                <p>¡Error!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="row">
            @forelse($images as $image)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/'. $image->url_img) }}" class="card-img-top" alt="Imagen">

                        <div class="card-body">
                            <h5 class="card-title">{{ $image->title }}</h5>
                            <p>{{ $image->description }}</p>

                            <a href="{{ route('images.edit', $image->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('images.destroy', $image->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay imágenes disponibles.</p>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $images->links() }}
        </div>
    </div>
@endsection
