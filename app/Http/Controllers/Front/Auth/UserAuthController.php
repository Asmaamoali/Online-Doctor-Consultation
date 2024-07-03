<?php

namespace App\Http\Controllers\Front\Auth;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\User\Auth\LoginRequest;
use App\Http\Requests\Front\User\Auth\RegisterRequest;
use App\Http\Requests\Front\User\Auth\ForgetPasswordRequest;
use App\Http\Requests\Front\User\Auth\ResetPasswordRequest;
use App\Mail\ForgetPassword;

class UserAuthController extends Controller
{
    use ImageTrait;

    public function index()
    {
        if (auth()->check()) {
            return redirect()
                ->route('front.home');
        }
        return view('front.pages.auth.login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], true)) {
            $user = User::where('email', $data['email'])
                ->where('role', 'user')
                ->first();
            Auth::login($user, true);
            return redirect()
                ->to(route('front.home'))
                ->with('Success', 'Welcome Back');
        }
        return back()
            ->with('Error', 'Wrong Email Or Password');
    }

    public function register()
    {
        if (auth()->check()) {
            return redirect()
                ->route('front.home');
        }
        return view('front.pages.auth.register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'user';
        $data['image'] = ImageTrait::uploadImage($request->file('image'), 'admin/users');
        $user = User::create($data);
        Auth::login($user, true);
        return redirect()
            ->to(route('front.home'))
            ->with('Success', 'Registered Successfully');
    }


    public function forgetPassword()
    {
        if (auth()->check()) {
            return redirect()
                ->route('front.home');
        }
        return view('front.pages.auth.forget_password');
    }

    public function forgetPasswordSubmit(ForgetPasswordRequest $request)
    {
        if (auth()->check()) {
            return redirect()
                ->route('front.home');
        }
        $data = $request->validated();
        $user = User::where('email', $data['email'])
            ->where('role', 'user')
            ->first();
        if (!$user) {
            return back()
                ->with('Error', 'Not Found');
        }
        $otp = rand(1000, 9999);
        $message = 'Your OTP To Reset Password Is : ' . $otp;
        $user->update([
            'otp' => $otp
        ]);
        Mail::to($user->email)->send(new ForgetPassword($message));
        return redirect()
            ->to(route('front.users.resetPassword'))
            ->with('Success', 'OTP sent successfully.');
    }

    public function resetPassword()
    {
        return view('front.pages.auth.reset_password');
    }

    public function resetPasswordSubmit(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $user = User::where('otp', $data['otp'])
            ->where('role', 'user')
            ->first();
        if (!$user) {
            return back()
                ->with('Error', 'Not Found');
        }
        if ($user->otp != $data['otp']) {
            return back()
                ->with('Error', 'Wrong OTP');
        }
        $user->update([
            'password' =>  $data['new_password']
        ]);
        return redirect()
            ->to(route('front.users.login'))
            ->with('Success', 'Password Reset Successfully');
    }

    public function logoutSubmit()
    {
        if (auth()->check() && auth()->user()->role != 'user') {
            return redirect()
                ->route('front.home')
                ->with('Error', 'Unautherized');
        }
        Auth::logout();
        return redirect()
            ->to(route('front.home'))
            ->with("Success", 'Logout Successfully');
    }
}
