@extends('layouts.app')
@section('title', 'Edit Doctor')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Doctor</h3>
                        </div>
                        <form method="POST" action="{{ route('doctors.update', $doctor->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" value="{{ old('name', $doctor->name) }}" name="name"
                                        class="form-control" id="exampleInputName" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{ old('email', $doctor->email) }}" name="email"
                                        class="form-control" id="exampleInputEmail1" placeholder="Enter E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="text" value="{{ old('phone', $doctor->phone) }}" name="phone"
                                        class="form-control" id="exampleInputPhone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password"
                                        class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select data-old-sub="{{ old('sub_category_id', $doctor->sub_category_id) }}"
                                        name="category_id" id="category" class="form-control">
                                        <option disabled selected>Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option @selected($category->id == old('category_id', $doctor->category_id)) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category">Sub-Category</label>
                                    <select name="sub_category_id" id="sub_category" class="form-control">
                                        <option disabled selected>Choose Sub-Category</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img width="150px" src="{{ displayImage($doctor->image) }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            function loadSubCategories(category_id, selected_sub_category_id = null) {
                if (category_id) {
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
                                '<option value="" disabled selected>Choose Sub-Category</option>'
                            );
                            $.each(sub_categories, function(index, sub_category) {
                                $('#sub_category').append('<option value="' +
                                    sub_category.id + '">' + sub_category.name +
                                    '</option>');
                            });
                            if (selected_sub_category_id) {
                                $('#sub_category').val(selected_sub_category_id);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#sub_category').empty();
                    $('#sub_category').append(
                        '<option value="" disabled selected>Choose Sub-Category</option>');
                }
            }

            var oldCategoryId = $('#category').val();
            var oldSubCategoryId = $('#category').data('old-sub');

            if (oldCategoryId) {
                loadSubCategories(oldCategoryId, oldSubCategoryId);
            }

            $('#category').change(function() {
                var category_id = $(this).val();
                loadSubCategories(category_id);
            });
        });
    </script>
@endsection
