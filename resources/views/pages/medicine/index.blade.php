@extends('layouts.app')
@section('title', 'Medicines')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Medicines</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Instructions</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicines as $medicine)
                                        <tr>
                                            <td>{{ $medicine->id }}</td>
                                            <td>{{ $medicine->name }}</td>
                                            <td>{!! $medicine->description !!}</td>
                                            <td>{!! $medicine->instructions !!}</td>
                                            <td>
                                                <img width="200px" src="{{ displayImage($medicine->image) }}"
                                                    alt="{{ $medicine->name }}">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-warning" style="margin-left: 10px;"
                                                        href="{{ route('medicines.edit', $medicine->id) }}">Edit</a>
                                                    <form action="{{ route('medicines.destroy', $medicine->id) }}"
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
                            {{ $medicines->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
