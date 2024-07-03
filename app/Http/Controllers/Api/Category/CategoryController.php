<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\ShowCategoryResource;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $categories = Category::whereHas('subCategories', function ($subCategory) {
            $subCategory->whereHas('symptoms', function ($symptoms) {
                $symptoms->whereHas('medicines');
            });
        })
            ->paginate();
        return ApiResponseTrait::apiResponse(new CategoryCollection($categories));
    }

    public function show(Category $category)
    {
        $category = Category::withWhereHas('subCategories', function ($subCategory) {
            $subCategory->whereHas('symptoms', function ($symptoms) {
                $symptoms->whereHas('medicines');
            });
        })
            ->findOrFail($category->id);
        return ApiResponseTrait::apiResponse(new ShowCategoryResource($category));
    }
}
