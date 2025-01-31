<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Image;
use App\Traits\ConfirmDeletion;

class ImageDetail extends Component
{
    use ConfirmDeletion;

    public $image;
    public $confirmScript;

    public function mount($image)
    {
        $this->image = $image;
        $this->confirmScript = $this->confirmDelete($image->id);
    }

    public function render()
    {
        return view('livewire.image-detail');
    }
}
