<?php

namespace Tests\Feature;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageCardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function image_card_blade_has_edit_and_delete_buttons()
    {
        $image = Image::factory()->create([
            'title' => 'Test Image',
            'description' => 'Descripción de prueba',
            'url_img' => 'test-image.jpg',
        ]);

        $this->blade('<livewire:image-card :image="$image" />', ['image' => $image])
            ->assertSee('Editar')
            ->assertSee('Eliminar');
    }
}
