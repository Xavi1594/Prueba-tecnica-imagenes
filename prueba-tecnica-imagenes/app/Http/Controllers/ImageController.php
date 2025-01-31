<?php
namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Traits\ConfirmDeletion;


use Illuminate\Http\Request;

class ImageController extends Controller
{
    use ConfirmDeletion;
    public function index(Request $request)
    {
        $images = Image::all();
    return view('images.index', compact('images'));
    }



    public function create() {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');

            Image::create([
                'title' => $request->title,
                'description' => $request->description,
                'url_img' => $path
            ]);

            return redirect()->route('images.index')->with('success', 'Imagen subida con éxito');
        }

        return back()->with('error', 'Error al subir la imagen');
    }


    public function show($id)
    {
        $image = Image::findOrFail($id);
        $confirmScript = $this->confirmDelete($id);

        return view('images.show', compact('image', 'confirmScript')); // Pasa $confirmScript a la vista
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image->url_img = $path;
        }

        $image->save();
        return redirect()->route('images.index')->with('success', 'Imagen editada con éxito');

    }


    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if (Storage::disk('public')->exists($image->url_img)) {
            Storage::disk('public')->delete($image->url_img);
        }

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Imagen eliminada con éxito');
    }


}
