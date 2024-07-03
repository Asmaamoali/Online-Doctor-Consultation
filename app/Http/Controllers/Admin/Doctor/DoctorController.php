<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Models\User;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doctor\StoreDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorRequest;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $doctors = User::where('role', 'doctor')
            ->with('category', 'subCategory')
            ->paginate();
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $categories = Category::whereHas('subCategories')
            ->get();
        return view('pages.doctors.create', compact('categories'));
    }

    public function store(StoreDoctorRequest $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::uploadImage($request->file('image'), 'admin/doctors');
        $data['role'] = 'doctor';
        User::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit($id)
    {
        $doctor = User::with('category', 'subCategory')
            ->where('id', $id)
            ->where('role', 'doctor')
            ->first();
        if (!$doctor) {
            return redirect()
                ->route('doctors.index')
                ->with("Error", "Not Found");
        }
        $categories = Category::whereHas('subCategories')
            ->get();
        return view('pages.doctors.edit', compact('doctor', 'categories'));
    }

    public function update(UpdateDoctorRequest $request, $id)
    {
        $doctor = User::with('category', 'subCategory')
            ->where('id', $id)
            ->where('role', 'doctor')
            ->first();
        if (!$doctor) {
            return redirect()
                ->route('doctors.index')
                ->with("Error", "Not Found");
        }
        $data = $request->validated();
        if (!isset($data['password'])) {
            unset($data['password']);
        }
        $data['image'] = ImageTrait::updateImage($doctor->image, 'admin/doctors', 'image');
        $doctor->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $doctor = User::with('category', 'subCategory')
            ->where('id', $id)
            ->where('role', 'doctor')
            ->first();
        if (!$doctor) {
            return redirect()
                ->route('doctors.index')
                ->with("Error", "Not Found");
        }
        Storage::disk('public')->delete($doctor->image);
        $doctor->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
