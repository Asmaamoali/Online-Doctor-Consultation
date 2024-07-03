@extends('front.layouts.app')
@section('content')
    <section id="appointment" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>SignIn</h2>
            </div>

            <form action="{{ route('front.users.loginSubmit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required value="{{ old('email') }}">
                    </div>
                    <div class="col-lg-6 col-md-12 form-group mt-3 mt-md-0">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Your Password" required>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mt-5">
                    <button style="border: none; outline: none" class="appointment-btn mb-3" id="submit-button">
                        <span class="d-md-inline">SignIn</span>
                    </button>
                    <a href="{{ route('front.users.forgetPassword') }}" type="button" style="border: none; outline: none"
                        class="appointment-btn bg-warning">
                        <span class="d-md-inline">Forget Password?</span>
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
