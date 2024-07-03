@extends('layouts.app')
@section('title', 'Add New Sub-Category')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Sub-Category</h3>
                        </div>
                        <form method="POST" action="{{ route('sub-categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleCategory">Category</label>
                                    <select class="form-control" name="category_id" id="exampleCategory">
                                        <option hidden selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == old('category_id') ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
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
