@extends('front.layouts.app')
@section('content')
    <section id="appointment" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Reset Password</h2>
            </div>

            <form action="{{ route('front.users.resetPasswordSubmit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 form-group mb-3">
                        <input type="text" class="form-control" name="otp" id="otp" placeholder="OTP Code"
                            required value="{{ old('otp') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 form-group mb-3">
                        <input type="password" class="form-control" name="new_password" id="new_password"
                            placeholder="Your New Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 form-group mb-3">
                        <input type="password" class="form-control" name="new_password_confirmation"
                            id="new_password_confirmation" placeholder="Your New Password Confirmation" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button style="border: none; outline: none" class="appointment-btn scrollto" id="submit-button">
                        <span class="d-none d-md-inline">Reset Password</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
