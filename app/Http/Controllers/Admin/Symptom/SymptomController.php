<?php

namespace App\Http\Controllers\Admin\Symptom;

use App\Models\Symptom;
use App\Models\Medicine;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Symptom\ControlMedicine;
use App\Http\Requests\Admin\Symptom\StoreSymptom;
use App\Http\Requests\Admin\Symptom\UpdateSymptom;

class SymptomController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::with('subCategory', 'medicines')
            ->paginate();
        $medicines = Medicine::get();
        return view('pages.symptom.index', compact('symptoms', 'medicines'));
    }

    public function controlMedicine(Symptom $symptom, ControlMedicine $request)
    {
        $data = $request->validated();
        $symptom->medicines()->sync($data['medicine_id']);
        return back()
            ->with('Success', 'Success Control Symptom\'s Medicines');
    }

    public function create()
    {
        $subCategories = SubCategory::get();
        return view('pages.symptom.create', compact('subCategories'));
    }

    public function store(StoreSymptom $request)
    {
        $data = $request->validated();
        Symptom::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit(Symptom $symptom)
    {
        $subCategories = SubCategory::get();
        return view('pages.symptom.edit', compact('symptom', 'subCategories'));
    }

    public function update(Symptom $symptom, UpdateSymptom $request)
    {
        $data = $request->validated();
        $symptom->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy(Symptom $symptom)
    {
        $symptom->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
