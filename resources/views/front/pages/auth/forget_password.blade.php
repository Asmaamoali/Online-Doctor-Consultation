@extends('front.layouts.app')
@section('content')
    <section id="appointment" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Forget Password ?</h2>
            </div>

            <form action="{{ route('front.users.forgetPasswordSubmit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required value="{{ old('email') }}">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mt-5">
                    <button style="border: none; outline: none" class="appointment-btn mb-3" id="submit-button">
                        <span class="d-md-inline">Reset Password</span>
                    </button>
                    <a href="{{ route('front.users.login') }}" type="button" style="border: none; outline: none"
                        class="appointment-btn bg-warning">
                        <span class="d-md-inline">SignIn</span>
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
