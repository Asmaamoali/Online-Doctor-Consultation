<?php

namespace App\Http\Controllers\Doctor\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ImageTrait;
    public function index()
    {
        return view('doctor.pages.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        if (!isset($data['password'])) {
            unset($data['password']);
        }
        $data['image'] = ImageTrait::updateImage(auth()->user()->image, 'admin/doctors', 'image');
        auth()->user()
            ->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }
}
