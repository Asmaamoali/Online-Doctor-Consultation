@extends('front.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #submit-button {
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .mt-5 {
            margin-top: 3rem !important;
        }
        .table-container {
            margin-top: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .table-bordered {
            width: 80%;
            border-collapse: collapse;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
    </style>
@endsection
@section('content')
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Get Your Medicine</h2>
            </div>
            <form id="medicine-form" action="{{ route('submitAppointment') }}" method="post" class="center-content">
                @csrf
                <div class="row justify-content-space-between" style="width: 100%">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <select name="sub_category" id="subCategory" class="js-example-basic-single form-control">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($subCategories as $sub)
                                <option value="{{ $sub->id }}" {{ old('sub_category') == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 form-group mt-3">
                        <select name="symptoms[]" multiple class="js-example-basic-multiple form-control" id="symptoms">
                        </select>
                    </div>
                </div>

                <div class="table-container">
                    <table id="medicines-table" class="table table-bordered mt-5">
                        <thead class="thead-dark">
                            <tr>
                                <th>Symptom</th>
                                <th>Medicines</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <center>
                    <button type="button" class="appointment-btn scrollto mt-5" id="submit-button">
                        <span class="d-none d-md-inline">Get Medicine</span>
                    </button>
                </center>
            </form>
        </div>
    </section>
    <!-- End Appointment Section -->

    <!-- Modal -->
    <div class="modal fade" id="medicineModal" tabindex="-1" aria-labelledby="medicineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicineModalLabel">Medicine Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="medicineImage" src="" alt="Medicine Image" class="img-fluid mb-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td id="medicineName"></td>
                            </tr>
                            <tr>
                                <th scope="row">Instructions</th>
                                <td id="medicineInstructions"></td>
                            </tr>
                            <tr>
                                <th scope="row">Description</th>
                                <td id="medicineDescription"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for single select
            $('.js-example-basic-single').select2();

            $('#submit-button').on('click', function(event) {
                event.preventDefault();
                var selectedSymptoms = $('#symptoms').val();
                if (selectedSymptoms && selectedSymptoms.length > 0) {
                    $.ajax({
                        url: '{{ route('getMedicines') }}',
                        type: 'GET',
                        data: {
                            symptoms: selectedSymptoms
                        },
                        success: function(response) {
                            var medicinesBySymptom = response;
                            $('#medicines-table tbody').empty();

                            // Loop through the response to populate the table
                            $.each(medicinesBySymptom, function(symptom, medicines) {
                                var medicinesList = '<ul>';
                                $.each(medicines, function(index, medicine) {
                                    medicinesList += '<li><button type="button" class="medicine-btn btn btn-link" data-toggle="modal" data-target="#medicineModal" data-name="' + medicine.name + '" data-image="' + medicine.image + '" data-instructions="' + medicine.instructions + '" data-description="' + medicine.description + '">' + medicine.name + '</button></li>';
                                });
                                medicinesList += '</ul>';
                                $('#medicines-table tbody').append(
                                    '<tr><td>' + symptom + '</td><td>' + medicinesList + '</td></tr>'
                                );
                            });

                            // Add click event to medicine buttons
                            $('.medicine-btn').on('click', function() {
                                var name = $(this).data('name');
                                var image = $(this).data('image');
                                var instructions = $(this).data('instructions');
                                var description = $(this).data('description');

                                $('#medicineModalLabel').text(name);
                                $('#medicineImage').attr('src', '{{displayImage('')}}'+'/'+image);
                                $('#medicineName').text(name);
                                $('#medicineInstructions').text(instructions);
                                $('#medicineDescription').text(description);
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    alert('Please select at least one symptom.');
                }
            });

            $('#subCategory').change(function() {
                var sub_category_id = $(this).val();
                if (sub_category_id) {
                    // AJAX request to get sub-categories
                    $.ajax({
                        url: '{{ route('getSymptoms') }}',
                        type: 'GET',
                        data: {
                            sub_category_id: sub_category_id
                        },
                        success: function(response) {
                            var symptoms = response;
                            $('#symptoms').empty();
                            $.each(symptoms, function(index, symptom) {
                                $('#symptoms').append('<option value="' + symptom.id + '">' + symptom.name + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#symptoms').empty();
                    $('#symptoms').append('<option value="" disabled selected>Select Sub Category</option>');
                }
            });

            // Initialize Select2 for multiple select
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
