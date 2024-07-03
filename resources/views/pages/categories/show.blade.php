@extends('layouts.app')
@section('title', 'Show Category')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Category</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $subCategory)
                                        <tr>
                                            <td>{{ $subCategory->id }}</td>
                                            <td>{{ $subCategory->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('sub-categories.show', $subCategory->id) }}">
                                                        Show
                                                    </a>
                                                    <a class="btn btn-warning" style="margin-left: 10px;"
                                                        href="{{ route('sub-categories.edit', $subCategory->id) }}">Edit</a>
                                                    <form action="{{ route('sub-categories.destroy', $subCategory->id) }}"
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
                            {{ $subCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
