@extends('layouts.app')
@section('title', 'Add New Symptom')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Symptom</h3>
                        </div>
                        <form method="POST" action="{{ route('symptoms.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSubCategory">Sub-Category</label>
                                    <select class="form-control" name="sub_category_id" id="exampleSubCategory">
                                        <option hidden selected>Select Sub-Category</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option {{ $subCategory->id == old('sub_category_id') ? 'selected' : '' }}
                                                value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
