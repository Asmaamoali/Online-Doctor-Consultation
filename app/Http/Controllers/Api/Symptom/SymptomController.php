<?php

namespace App\Http\Controllers\Api\Symptom;

use App\Models\Symptom;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Search\SearchCollection;
use App\Http\Resources\Symptom\SymptomCollection;
use App\Http\Resources\Symptom\ShowSymptomResource;

class SymptomController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $symptoms = Symptom::whereHas('medicines')
            ->with('subCategory')
            ->paginate();
        return ApiResponseTrait::apiResponse(new SymptomCollection($symptoms));
    }

    public function show(Symptom $symptom)
    {
        $symptom = Symptom::withWhereHas('medicines')
            ->with('subCategory')
            ->findOrFail($symptom->id);
        return ApiResponseTrait::apiResponse(new ShowSymptomResource($symptom));
    }

    public function search(SearchRequest $request)
    {
        $data = $request->validated();
        $result = Symptom::where('sub_category_id', $data['sub_category_id'])
            ->whereIn('id', $data['symptom_id'])
            ->withWhereHas('medicines')
            ->get();
        return ApiResponseTrait::apiResponse(new SearchCollection($result));
    }
}
