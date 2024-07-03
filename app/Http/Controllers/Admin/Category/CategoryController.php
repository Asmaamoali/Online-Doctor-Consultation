<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategory;
use App\Http\Requests\Admin\Category\UpdateCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $categories = Category::paginate();
        return view('pages.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $subCategories = SubCategory::select('id', 'name')
            ->where('category_id', $category->id)
            ->paginate();
        return view('pages.categories.show', compact('subCategories', 'category'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(StoreCategory $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::uploadImage($data['image'], 'admin/categories');
        Category::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(UpdateCategory $request, Category $category)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::updateImage($category->image, 'admin/categories', 'image');
        $category->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category->image);
        $category->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
