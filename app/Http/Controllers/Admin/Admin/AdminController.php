<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\Admin\UpdateAdminRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $admins = User::where('role', 'admin')
            ->where('id', "!=", auth()->id())
            ->paginate();
        return view('pages.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('pages.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $data['image'] = ImageTrait::uploadImage($request->file('image'), 'admin/admins');
        $data['role'] = 'admin';
        User::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit($id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->where('id', '!=', auth()->id())
            ->first();
        if (!$admin) {
            return redirect()
                ->route('admins.index')
                ->with("Error", "Not Found");
        }
        return view('pages.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->where('id', '!=', auth()->id())
            ->first();
        if (!$admin) {
            return redirect()
                ->route('admins.index')
                ->with("Error", "Not Found");
        }
        $data = $request->validated();
        if (!isset($data['password'])) {
            unset($data['password']);
        }
        $data['image'] = ImageTrait::updateImage($admin->image, 'admin/admins', 'image');
        $admin->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->where('id', '!=', auth()->id())
            ->first();
        if (!$admin) {
            return redirect()
                ->route('admins.index')
                ->with("Error", "Not Found");
        }
        Storage::disk('public')->delete($admin->image);
        $admin->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
