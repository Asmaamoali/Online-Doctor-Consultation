<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gallery\StoreGalleryRequest;
use App\Http\Requests\Admin\Gallery\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $galleries = Gallery::paginate();
        return view('pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('pages.gallery.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::uploadImage($request->file('image'), 'admin/galleries');
        Gallery::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit(Gallery $gallery)
    {
        return view('pages.gallery.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::updateImage($gallery->image, 'admin/galleries', 'image');
        $gallery->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
