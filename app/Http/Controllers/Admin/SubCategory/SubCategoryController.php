<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\StoreSubCategory;
use App\Http\Requests\Admin\SubCategory\UpdateSubCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('category')
            ->paginate();
        return view('pages.sub_category.index', compact('subCategories'));
    }

    public function show(SubCategory $subCategory)
    {
        $symptoms = Symptom::select('id', 'name')
            ->where('sub_category_id', $subCategory->id)
            ->paginate();
        return view('pages.sub_category.show', compact('symptoms', 'subCategory'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->get();
        return view('pages.sub_category.create', compact('categories'));
    }

    public function store(StoreSubCategory $request)
    {
        $data = $request->validated();
        SubCategory::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::select('id', 'name')
            ->get();
        return view('pages.sub_category.edit', compact('categories', 'subCategory'));
    }

    public function update(SubCategory $subCategory, UpdateSubCategory $request)
    {
        $data = $request->validated();
        $subCategory->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
