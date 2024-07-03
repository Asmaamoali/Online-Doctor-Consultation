@extends('layouts.app')
@section('title', 'Edit Medicine')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Medicine</h3>
                        </div>
                        <form method="POST" action="{{ route('medicines.update', $medicine->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ $medicine->name }}" name="name" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDescription">Description</label>
                                    <textarea name="description" class="form-control" id="exampleDescription" cols="5" rows="5">{{ $medicine->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInstructions">Instructions</label>
                                    <textarea name="instructions" class="form-control" id="exampleInstructions" cols="5" rows="5">{{ $medicine->instructions }}</textarea>
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
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
