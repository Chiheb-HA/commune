<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::with(['creator', 'images'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.form', ['gallery' => new Gallery()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
        ]);

        $gallery = Gallery::create([
            ...$validated,
            'created_by' => auth()->id(),
            'status' => 'draft',
        ]);

        return redirect()->route('admin.galleries.edit', $gallery)
            ->with('success', 'Gallery created successfully');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.form', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
        ]);

        $gallery->update($validated);

        return redirect()->back()
            ->with('success', 'Gallery updated successfully');
    }

    public function addImage(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:5120',
            'title_fr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'caption_fr' => 'nullable|string',
            'caption_en' => 'nullable|string',
            'caption_ar' => 'nullable|string',
        ]);

        // Store image and create GalleryImage record
        $path = $request->file('image')->store('galleries', 'public');

        GalleryImage::create([
            'gallery_id' => $gallery->id,
            'image_url' => $path,
            'title_fr' => $validated['title_fr'] ?? null,
            'title_en' => $validated['title_en'] ?? null,
            'title_ar' => $validated['title_ar'] ?? null,
            'caption_fr' => $validated['caption_fr'] ?? null,
            'caption_en' => $validated['caption_en'] ?? null,
            'caption_ar' => $validated['caption_ar'] ?? null,
            'order' => $gallery->images()->max('order') + 1,
        ]);

        return redirect()->back()->with('success', 'Image added successfully');
    }

    public function removeImage(GalleryImage $image)
    {
        $gallery = $image->gallery;
        $image->delete();

        return redirect()->back()->with('success', 'Image removed successfully');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery deleted successfully');
    }
}
