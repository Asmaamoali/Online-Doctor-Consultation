@extends('layouts.app')
@section('title', 'Edit Admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Admin</h3>
                        </div>
                        <form method="POST" action="{{ route('admins.update', $admin->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" value="{{ old('name', $admin->name) }}" name="name"
                                        class="form-control" id="exampleInputName" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{ old('email', $admin->email) }}" name="email"
                                        class="form-control" id="exampleInputEmail1" placeholder="Enter E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="text" value="{{ old('phone', $admin->phone) }}" name="phone"
                                        class="form-control" id="exampleInputPhone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password"
                                        class="form-control" id="exampleInputPassword" placeholder="Enter Password">
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
                                    <img width="150px" src="{{ displayImage($admin->image) }}" alt="">
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
