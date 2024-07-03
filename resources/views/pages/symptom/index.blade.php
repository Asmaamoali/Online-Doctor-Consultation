@extends('layouts.app')
@section('title', 'Show Symptoms')
@section('css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Symptoms</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Sub-Category</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($symptoms as $symptom)
                                        <tr>
                                            <td>{{ $symptom->id }}</td>
                                            <td>{{ $symptom->name }}</td>
                                            <td>{{ $symptom->subCategory->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#addMedicine{{ $symptom->id }}">
                                                        Medicines</button>
                                                    </button>
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
                                        <div class="modal fade" id="addMedicine{{ $symptom->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Control
                                                            Medicines
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('symptoms.controlMedicine', $symptom->id) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <select style="width: 100%" name="medicine_id[]"
                                                                class="form-control js-example-basic-multiple"
                                                                multiple="multiple">
                                                                @foreach ($medicines as $medicine)
                                                                    <option
                                                                        {{ $symptom->medicines->contains($medicine->id) ? 'selected' : '' }}
                                                                        value="{{ $medicine->id }}">
                                                                        {{ $medicine->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" type="button"
                                                                class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
@section('js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
