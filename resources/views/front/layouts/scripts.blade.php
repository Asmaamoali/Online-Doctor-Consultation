 <!-- Vendor JS Files -->
 <script src="{{asset('front_assets/assets')}}/vendor/purecounter/purecounter_vanilla.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/aos/aos.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
 <script src="{{asset('front_assets/assets')}}/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="{{asset('front_assets/assets')}}/js/main.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>

 <script>
     toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": false,
         "progressBar": false,
         "positionClass": "toast-top-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     @if (session()->has('Success'))
         toastr.success('{{ session()->get('Success') }}');
     @endif
     @if (session()->has('Error'))
         toastr.error('{{ session()->get('Error') }}');
     @endif

     @if (session()->has('Warn'))
         toastr.warning('{{ session()->get('Warn') }}');
     @endif

     @if ($errors->any())
         @foreach ($errors->all() as $error)
             toastr.error('{{ $error }}');
         @endforeach
     @endif

     $('.btn-delete').on('click', function(e) {
         e.preventDefault();
         var form = $(this).closest('form');

         var url = form.attr('action');
         var method = form.attr('method');
         swal({
             title: 'Are You Sure ?',
             icon: 'warning',
             buttons: ["No", "Yes"],
         }).then(function(value) {
             if (value) {
                 form.submit();
             }
         });
     });
 </script>
 @yield('js')
