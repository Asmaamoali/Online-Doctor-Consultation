<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageTrait;

    public function index()
    {
        return view('pages.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        if (!isset($data['password'])) {
            unset($data['password']);
        }
        $data['image'] = ImageTrait::updateImage(auth()->user()->image, 'admin/users', 'image');
        auth()->user()
            ->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }
}
