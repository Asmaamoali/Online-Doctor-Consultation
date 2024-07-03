<?php

namespace App\Http\Controllers\Api\SubCategory;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategory\SubCategoryCollection;
use App\Http\Resources\SubCategory\ShowSubCategoryResource;

class SubCategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $subCategories = SubCategory::whereHas('symptoms', function ($symptom) {
            $symptom->whereHas('medicines');
        })
            ->with('category')
            ->paginate();
        return ApiResponseTrait::apiResponse(new SubCategoryCollection($subCategories));
    }

    public function show(SubCategory $subCategory)
    {
        $subCategory = SubCategory::whereHas('symptoms', function ($symptom) {
            $symptom->whereHas('medicines');
        })
            ->with('category')
            ->findOrFail($subCategory->id);
        return ApiResponseTrait::apiResponse(new ShowSubCategoryResource($subCategory));
    }
}
