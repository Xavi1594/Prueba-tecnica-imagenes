<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Image;
use Livewire\WithPagination;

class ImageList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedImage = null;
    protected $listeners = [
        'imageDeleted' => 'refreshList'
    ];

    public function selectImage($imageId)
    {
        $this->selectedImage = Image::find($imageId); // Obtener la imagen seleccionada
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $images = Image::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('livewire.image-list', compact('images'));
    }
}
