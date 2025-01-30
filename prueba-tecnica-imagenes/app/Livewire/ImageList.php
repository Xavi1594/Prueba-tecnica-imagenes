<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;

class ImageList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $images = Image::where('title', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(3);

    return view('livewire.image-list', [
        'images' => $images,
    ]);
    }
}
