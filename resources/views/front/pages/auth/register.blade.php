@extends('front.layouts.app')
@section('content')
    <section id="appointment" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>SignUp</h2>
            </div>

            <form action="{{ route('front.users.registerSubmit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 form-group mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                            required value="{{ old('name') }}">
                    </div>
                    <div class="col-lg-6 col-md-12 form-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required value="{{ old('email') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 form-group mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                            required value="{{ old('phone') }}">
                    </div>
                    <div class="col-lg-6 col-md-12 form-group mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Your Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button style="border: none; outline: none" class="appointment-btn scrollto" id="submit-button">
                        <span class="d-none d-md-inline">SignUp</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
