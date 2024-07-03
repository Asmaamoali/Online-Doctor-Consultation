@extends('front.layouts.app')
@section('content')
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fa-solid fa-infinity"></i></div>
                        <h4 class="title"><a href="">Unlimited conversations with doctors</a></h4>
                        <p class="description">Chat with board-certified doctors until you’re satisfied. About any health
                            issue—from diabetes to mental health, and everything in between.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fas fa-pills"></i></div>
                        <h4 class="title"><a href="">Across all areas of medicine</a></h4>
                        <p class="description">We know life can be hard. So we try to make it simple: no forms or outrageous
                            fees,
                            no appointments that take weeks to book.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fa-solid fa-people-roof"></i></div>
                        <h4 class="title"><a href="">For you and your family</a></h4>
                        <p class="description">Share your membership in order to get the most bang for your buck and keep
                            the entire family cared for.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="fa-solid fa-clock"></i></div>
                        <h4 class="title"><a href="">At any hour</a></h4>
                        <p class="description">A team of doctors is standing by around the clock so you can stop any health
                            issue quickly and effectively.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3>In an emergency? Need help now?</h3>
                <p>When you can’t afford to be wrong, let the doctors on AskaDoctor help you get it right.</p>
                <a class="cta-btn scrollto" href="#appointment"> Make an Appointment</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('front_assets/assets') }}/img/young-doctor.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Why You Should Trust Us? Get Know About Us!</h3>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Quality health care</li>
                        <li><i class="bi bi-check-circle"></i> Only Qualified Doctors</li>
                        <li><i class="bi bi-check-circle"></i> Medical Research Professionals.</li>
                    </ul>

                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-user-md"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $doctors->count() }}"
                            data-purecounter-duration="1" class="purecounter"></span>

                        <p><strong>Doctors</strong> Only Qualified Doctors</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="far fa-hospital"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $categories->count() }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Departments</strong> There are diffrent departments at all medical fields</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-flask"></i>
                        <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Research Lab</strong> Our doctors make research lab on many diseases</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="fas fa-award"></i>
                        <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p><strong>Awards</strong> Our site has many awards from international systems</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <div class="icon-box mt-5 mt-lg-0">
                        <i class="fa-solid fa-circle-check"></i>
                        <h4>Quality</h4>
                        <!-- <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p> -->
                    </div>
                    <div class="icon-box mt-5">
                        <i class="fa-solid fa-folder-plus"></i>
                        <h4>Positive</h4>
                        <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p> -->
                    </div>
                    <div class="icon-box mt-5">
                        <i class="fa-solid fa-clock"></i>
                        <h4> 24 Hours</h4>
                        <!-- <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p> -->
                    </div>
                    <div class="icon-box mt-5">
                        <i class="fa-solid fa-user-doctor"></i>
                        <h4>Experience</h4>
                        <!-- <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p> -->
                    </div>
                </div>
                <div class="image col-lg-6 order-1 order-lg-2"
                    style='background-image: url("{{ asset('front_assets/assets') }}/img/features.jpg");'
                    data-aos="zoom-in"></div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fa-solid fa-lock"></i></i></div>
                    <h4 class="title"><a href="">Comfort and privacy </a></h4>
                    <p class="description">The field of electronic health care or remote health care is a
                        suitable alternative to visiting a doctor’s office and taking a traditional consultation,
                        as it provides patients with comfort and privacy,
                        which is one of the most important features of remote medical consultation. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fa-solid fa-clock"></i></div>
                    <h4 class="title"><a href="">Save time</a></h4>
                    <p class="description">Other most important benefits of remote medical
                        consultations include shortening the distances and time the patient spends
                        going to the clinic and waiting for his turn, especially when it comes to the
                        elderly or disabled, or those whose special circumstances prevent them from reaching
                        the hospital or the doctor’s clinic in question. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fas fa-hospital-user"></i></div>
                    <h4 class="title"><a href="">Improving health care </a></h4>
                    <p class="description">care Telemedicine is not only an alternative plan to traditional clinic visits,
                        but it is also a method and approach used to significantly improve the field of health care,
                        by reducing the burden on the medical staff and facilitating access to the necessary health care.
                    </p>
                </div>
            </div>
    </section><!-- End Services Section -->

    <!-- ======= Appointment Section ======= -->
    @if (auth()->check() && auth()->user()->role == 'user')
        <section id="appointment" class="appointment section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Make an Medical Consultation</h2>
                </div>

                <form action="{{ route('submitAppointment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" required value="{{ old('name', auth()->user()->name) }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required value="{{ old('email', auth()->user()->email) }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Your Phone" required value="{{ old('phone', auth()->user()->phone) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mt-3">
                            <select name="category" id="category" class="form-select">
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($availableCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="sub_category" id="sub_category" class="form-select">
                                <option value="" disabled>Select Sub Category</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="doctor" id="doctor" class="form-select">
                                <option value="" disabled>Select Doctor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)">{{ old('message') }}</textarea>
                    </div>
                    <center>
                        <a href="#" class="appointment-btn scrollto mt-5" id="submit-button"><span
                                class="d-none d-md-inline">Consult</span></a>
                    </center>
                </form>


            </div>
        </section>
    @endif
    <!-- End Appointment Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Departments</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <ul class="nav nav-tabs flex-column">
                        @foreach ($categories as $index => $category)
                            <li class="nav-item">
                                <a class="nav-link {{ $index === 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                    href="#tab-{{ $category->id }}">
                                    <h4>{{ $category->name }}</h4>
                                    <ul class="list-unstyled">
                                        @foreach ($category->subCategories as $subCategory)
                                            <li>{{ $subCategory->name }}</li>
                                        @endforeach
                                    </ul>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        @foreach ($categories as $index => $category)
                            <div class="tab-pane fade {{ $index === 0 ? 'active show' : '' }}"
                                id="tab-{{ $category->id }}">
                                <h3>{{ $category->name }}</h3>
                                <p class="fst-italic">Some introductory text or description for {{ $category->name }}</p>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-right:20px;">
                                        <img src="{{ displayImage($category->image) }}"
                                            alt="" style="max-width:300px" class="img-fluid">
                                    </div>
                                    <div class="col-lg-8">
                                       <a href="{{route("get.medicine",$category->id)}}" style="background:#3fbbc0;border:none" class="btn btn-primary">Get Medicine</a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Departments Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Recommendation</h2>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                I had been to an offline doctor in indira nagar, and he gave me 3 strong medicines for my
                                problems.
                                I became even more sick since they were too strong for me. but thank you so much doctor i
                                feel much better.
                                I will defintely consult you for all my consultations
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/assets') }}/img/testimonials/testimonials-1.jpg"
                                class="testimonial-img" alt="">
                            <h3>Ahmed Gamal</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Satisfied. thought as a user who is used to paying 600-1000 for consultation
                                i would recommed increasing fee to 600 atleast.
                                People will pay that amount since it is difficult to find good doctors easily these days
                                without long waits and appointments.
                                just friendly suggestion <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/assets') }}/img/testimonials/testimonials-2.jpg"
                                class="testimonial-img" alt="">
                            <h3>Sara Wael</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Doctor answered in 5 minutes only,
                                then spoke for over 30 minutes, hv nvr met dr's who spend that long,
                                simply explained in laymen language, great, thank you doctor.
                                you are blessing sent by god. i am extremely thankful to you.
                                and treatment has worked, i feel very good now. thank you so much! <i
                                    class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/assets') }}/img/testimonials/testimonials-3.jpg"
                                class="testimonial-img" alt="">
                            <h3>Jenan Omar</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                certainly very happy. my friend had spoken to you 3 days ago. told me talk to you.
                                i was skeptical at first, but am very thankful. and i dont know why you are pricing it so
                                low.
                                even if this was priced double the price, i think people would pay for it,
                                since quality of doctors is amazing. my 2 cents. <i
                                    class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/assets') }}/img/testimonials/testimonials-4.jpg"
                                class="testimonial-img" alt="">
                            <h3>Mahmoud Soliman</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                i dont normally talk to doctors online. this is the first time.
                                and i have to say it was a good experience. doctor responded in about 7-8 minutes.
                                first asked many questions to understand my situation and then explained my case to me with
                                symptoms,
                                causes and diagnosis.
                                so awesome! will return and recommend my friends also! <i
                                    class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('front_assets/assets') }}/img/testimonials/testimonials-5.jpg"
                                class="testimonial-img" alt="">
                            <h3>Adel Rafat</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Doctors</h2>
            </div>

            <div class="row">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img style="height: 300px;width: 100%;object-fit: cover;"
                                    src="{{ displayImage($doctor->image) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $doctor->name }}</h4>
                                <span>{{ $doctor->category->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Gallery</h2>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($galleries as $gallery)
                        <div class="swiper-slide"><a class="gallery-lightbox"
                                href="{{ displayImage($gallery->image) }}"><img
                                    src="{{ displayImage($gallery->image) }}" class="img-fluid" alt=""></a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Frequently Asked Questioins Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Frequently Asked Questioins</h2>
            </div>

            <ul class="faq-list">
                @foreach ($faqs as $index => $faq)
                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $index }}">
                            {{ $faq->question }}<i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq{{ $index }}" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>
    </section><!-- End Frequently Asked Questioins Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

        </div>

        <div>
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container">

            <div class="row mt-5">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>esraay564@gmail.com<br>kholoud@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>+20 1147276924<br>+20 1019978347</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="{{ route('contactSubmit') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="contact_name" value="{{ old('contact_name') }}"
                                    class="form-control" id="name" placeholder="Your Name" required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="contact_email"
                                    value="{{ old('contact_email') }}" id="email" placeholder="Your Email"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"
                                id="subject" placeholder="Subject" required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="Message" required="">{{ old('message') }}</textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#submit-button').on('click', function(event) {
                event.preventDefault();
                $(this).closest('form').submit();
            });
            $('#category').change(function() {
                var category_id = $(this).val();
                if (category_id) {
                    // AJAX request to get sub-categories
                    $.ajax({
                        url: '{{ route('getSub') }}',
                        type: 'GET',
                        data: {
                            category_id: category_id
                        },
                        success: function(response) {
                            var sub_categories = response;
                            $('#sub_category').empty();
                            $('#sub_category').append(
                                '<option value="" disabled selected>Select Sub Category</option>'
                            );
                            $.each(sub_categories, function(index, sub_category) {
                                $('#sub_category').append('<option value="' +
                                    sub_category.id + '">' + sub_category.name +
                                    '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#sub_category').empty();
                    $('#sub_category').append(
                        '<option value="" disabled selected>Select Sub Category</option>');
                    $('#doctor').empty();
                    $('#doctor').append('<option value="" disabled selected>Select Doctor</option>');
                }
            });

            // When a sub-category is selected
            $('#sub_category').change(function() {
                var sub_category_id = $(this).val();
                if (sub_category_id) {
                    // AJAX request to get symptoms
                    $.ajax({
                        url: '{{ route('getDoctors') }}',
                        type: 'GET',
                        data: {
                            sub_category_id: sub_category_id
                        },
                        success: function(response) {
                            var doctors = response;
                            $('#doctor').empty();
                            $('#doctor').append(
                                '<option value="" disabled selected>Select Doctor</option>'
                            );
                            $.each(doctors, function(index, doctor) {
                                $('#doctor').append('<option value="' + doctor.id +
                                    '">' + doctor.name + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#doctor').empty();
                    $('#doctor').append('<option value="" disabled selected>Select Doctor</option>');
                }
            });
        });
    </script>
    <script src="//code.tidio.co/uva8eb3bud5k4qjv4up5fnx5c518he0j.js" async></script>
@endsection
