<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('doctor.pages.auth.login');
    }

    public function loginSubmit(AuthRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']], true)) {
            $doctor = User::where('email', '=', $data['email'])
                ->where('role', 'doctor')
                ->first();
            Auth::login($doctor, true);
            return redirect()
                ->route('doctor.dashboard.home');
        }
        return redirect()
            ->back()
            ->withErrors(['email' => 'Email or password is incorrect']);
    }

    public function logoutSubmit()
    {
        auth()
            ->logout();
        return redirect()
            ->route('doctor.auth.login');
    }
}
