<?php

namespace Tests\Unit;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_image_creation()
    {
        $image = Image::create([
            'title' => 'Test Image',
            'description' => 'Test description for the image',
            'url_img' => 'images/test.jpg',
        ]);

        $this->assertDatabaseHas('images', [
            'title' => 'Test Image',
            'description' => 'Test description for the image',
            'url_img' => 'images/test.jpg',
        ]);
    }



    public function test_image_update()
    {
        $image = Image::create([
            'title' => 'Old Image',
            'description' => 'Old description',
            'url_img' => 'images/old-image.jpg',
        ]);

        $image->update([
            'title' => 'Updated Image',
            'description' => 'Updated description',
        ]);

        $this->assertDatabaseHas('images', [
            'title' => 'Updated Image',
            'description' => 'Updated description',
        ]);
    }

    public function test_image_delete()
    {
        $image = Image::create([
            'title' => 'Delete Image',
            'description' => 'Delete description',
            'url_img' => 'images/delete-image.jpg',
        ]);

        $image->delete();

        $this->assertDatabaseMissing('images', [
            'title' => 'Delete Image',
            'description' => 'Delete description',
            'url_img' => 'images/delete-image.jpg',
        ]);
    }
}
