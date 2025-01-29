<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('images.index');
    }

    public function test_create()
    {
        $response = $this->get('/images/create');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/images', [
            'name' => 'Image Test',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_show()
    {
        $image = Image::factory()->create();
        $response = $this->get('/images/' . $image->id);
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $image = Image::factory()->create();
        $response = $this->get('/images/' . $image->id . '/edit');
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $image = Image::factory()->create();
        $response = $this->put('/images/' . $image->id, [
            'name' => 'Updated Image',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_destroy()
    {
        $image = Image::factory()->create();
        $response = $this->delete('/images/' . $image->id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
