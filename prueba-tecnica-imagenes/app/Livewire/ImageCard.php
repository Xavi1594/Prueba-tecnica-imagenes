<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Image;
use App\Traits\ConfirmDeletion;  // Asegúrate de importar el trait

class ImageCard extends Component
{
    use ConfirmDeletion;  // Usamos el trait en el componente Livewire

    public $image;
    public $showDetails = false;
    public $confirmScript;

    public function mount($image)
    {
        $this->image = $image;
        $this->confirmScript = $this->confirmDelete($image->id);  // Usamos el método del trait
    }

    public function toggleDetails()
    {
        $this->showDetails = !$this->showDetails;
    }

    public function render()
    {
        return view('livewire.image-card');
    }
}
