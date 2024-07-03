<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Models\Medicine;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Medicine\StoreMedicine;
use App\Http\Requests\Admin\Medicine\UpdateMedicine;

class MedicineController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $medicines = Medicine::paginate();
        return view('pages.medicine.index', compact('medicines'));
    }

    public function create()
    {
        return view('pages.medicine.create');
    }

    public function store(StoreMedicine $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::uploadImage($data['image'], 'admin/medicines');
        Medicine::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit(Medicine $medicine)
    {
        return view('pages.medicine.edit', compact('medicine'));
    }

    public function update(Medicine $medicine, UpdateMedicine $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::updateImage($medicine->image, 'admin/medicines', 'image');
        $medicine->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy(Medicine $medicine)
    {
        Storage::disk('public')->delete($medicine->image);
        $medicine->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
