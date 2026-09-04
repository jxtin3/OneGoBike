<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function index(Request $request)
    {
        $pictures = Picture::query()->when($request->search, fn ($query, $search) => $query->where('title', 'like', "%{$search}%"))->latest()->paginate(12)->withQueryString();
        return view('admin.operations.pictures.index', compact('pictures'));
    }

    public function create() { return view('admin.operations.pictures.create'); }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => ['required', 'string', 'max:255'], 'description' => ['nullable', 'string'], 'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120']]);
        $data['image_path'] = $request->file('image')->store('pictures', 'public');
        $data['uploaded_by'] = $request->user()->id;
        unset($data['image']);
        Picture::create($data);
        return redirect()->route('admin.operations.pictures.index')->with('success', 'Picture successfully uploaded.');
    }

    public function show(Picture $picture) { return view('admin.operations.pictures.show', compact('picture')); }
    public function edit(Picture $picture) { return view('admin.operations.pictures.edit', compact('picture')); }

    public function update(Request $request, Picture $picture)
    {
        $data = $request->validate(['title' => ['required', 'string', 'max:255'], 'description' => ['nullable', 'string'], 'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120']]);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($picture->image_path);
            $data['image_path'] = $request->file('image')->store('pictures', 'public');
        }
        unset($data['image']);
        $picture->update($data);
        return redirect()->route('admin.operations.pictures.index')->with('success', 'Picture successfully updated.');
    }

    public function destroy(Picture $picture)
    {
        Storage::disk('public')->delete($picture->image_path);
        $picture->delete();
        return back()->with('success', 'Picture successfully deleted.');
    }
}
