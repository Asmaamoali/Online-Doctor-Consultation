@extends('layouts.app')
@section('title', 'Show Sub-Category')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Sub-Category</h3>
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
                                    @foreach ($symptoms as $symptom)
                                        <tr>
                                            <td>{{ $symptom->id }}</td>
                                            <td>{{ $symptom->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('symptoms.show', $symptom->id) }}">
                                                        Show
                                                    </a>
                                                    <a class="btn btn-warning" style="margin-left: 10px;"
                                                        href="{{ route('symptoms.edit', $symptom->id) }}">Edit</a>
                                                    <form action="{{ route('symptoms.destroy', $symptom->id) }}"
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
                            {{ $symptoms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
