<div>
    <input type="text" class="form-control mb-3" placeholder="Buscar imágenes" wire:model="search">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach($images as $image)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/' . $image->url_img) }}" class="card-img-top" alt="Imagen">
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
    @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $images->onEachSide(1)->links() }}
    </div>

</div>
