@extends('layouts.app')
@section('title', 'Doctors')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Doctors</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->id }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->category->name }}</td>
                                            <td>{{ $doctor->subCategory->name }}</td>
                                            <td>
                                                <img width="150px" src="{{ displayImage($doctor->image) }}"
                                                    alt="{{ $doctor->name }}">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-warning" style="margin-left: 10px;"
                                                        href="{{ route('doctors.edit', $doctor->id) }}">Edit</a>
                                                    <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                                        method="POST" style="margin-left: 10px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-delete">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $doctors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
