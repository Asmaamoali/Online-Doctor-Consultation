 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="d-flex align-items-center fixed-top">
     <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
         <div class="align-items-center d-none d-md-flex">
             <i class="bi bi-clock"></i> Saturday - Friday, 8AM to 12PM
         </div>
         <div class="d-flex align-items-center">
             <i class="bi bi-phone"></i> Call us now +20 1147276924
         </div>
     </div>
 </div>

 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
     <div class="container d-flex align-items-center">

         <a href="{{ route('front.home') }}" class="logo me-auto"><img
                 src="{{ asset('front_assets/assets') }}/img/logo2.jpg" alt=""></a>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <h1 class="logo me-auto"><a href="index.html">Online Doctor</a></h1> -->

         <nav id="navbar" class="navbar order-last order-lg-0">
             <ul>
                 <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                 <li><a class="nav-link scrollto" href="#about">About</a></li>
                 <li><a class="nav-link scrollto" href="#services">Services</a></li>
                 <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                 <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                 <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

         @if (!auth()->check())
             <a href="{{ route('front.users.login') }}" class="appointment-btn">SignIn</a>
             <a href="{{ route('front.users.register') }}" class="appointment-btn">SignUp</a>
         @else
             <a @if (auth()->user()->role == 'admin') href="{{ route('admin.home') }}"
                @elseif (auth()->user()->role == 'user')
                href="{{ route('user.dashboard.home') }}"
                @elseif (auth()->user()->role == 'doctor')
                href="{{ route('doctor.dashboard.home') }}" @endif
                 class="appointment-btn">Dashboard</a>
             <form id="logout-form"
                 action="{{ route(auth()->user()->role == 'admin' ? 'auth.logout' : (auth()->user()->role == 'user' ? 'front.users.logoutSubmit' : (auth()->user()->role == 'doctor' ? 'doctor.auth.logoutSubmit' : '#'))) }}"
                 method="POST" style="display: none;">
                 @csrf
             </form>
             <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                 class="appointment-btn">Logout</a>
         @endif

     </div>
 </header><!-- End Header -->

 <!-- ======= Hero Section ======= -->
 <section id="hero">
     <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

         <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

         <div class="carousel-inner" role="listbox">

             <!-- Slide 1 -->
             <div class="carousel-item active"
                 style="background-image: url({{ asset('front_assets/assets') }}/img/slide/slide-1.jpg)">
                 <div class="container">
                     <h2>Welcome to <span>Online Doctor</span></h2>
                     <p>A small mistake with your health can cost you or your loved ones dearly. Don’t risk it by
                         relying on amateur advice or sifting through thousands of Google search results on your own.
                     </p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

             <!-- Slide 2 -->
             <div class="carousel-item"
                 style="background-image: url({{ asset('front_assets/assets') }}/img/slide/slide-2.jpg)">
                 <div class="container">
                     <h2>What can the health experts do for you?</h2>
                     <p>Your team of doctors is ready to help you in minutes with any health question,
                         Suggest natural treatments or home remedies, Help diagnose health issues.
                     </p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

             <!-- Slide 3 -->
             <div class="carousel-item"
                 style="background-image: url({{ asset('front_assets/assets') }}/img/slide/slide-3.jpg)">
                 <div class="container">
                     <h2>Making Health Care Better Together</h2>
                     <p>
                         Advantages of remote medical consultations, Consulting a doctor via telephone and remotely
                         provides the patient
                         and the doctor as well, with many benefits and features that make it a better option than
                         traditional consultations.
                     </p>
                     <a href="#about" class="btn-get-started scrollto">Read More</a>
                 </div>
             </div>

         </div>

         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a>

     </div>
 </section><!-- End Hero -->
