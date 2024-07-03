@extends('layouts.app')
@section('title', 'Gallery')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gallery</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $gallery->id }}</td>
                                            <td>
                                                <img width="150px" src="{{ displayImage($gallery->image) }}">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-warning" style="margin-left: 10px;"
                                                        href="{{ route('galleries.edit', $gallery->id) }}">Edit</a>
                                                    <form action="{{ route('galleries.destroy', $gallery->id) }}"
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
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
