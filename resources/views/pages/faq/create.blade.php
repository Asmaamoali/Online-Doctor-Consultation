@extends('layouts.app')
@section('title', 'Add New FAQ')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New FAQ</h3>
                        </div>
                        <form method="POST" action="{{ route('faqs.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="quesiton">Question</label>
                                    <input type="text" value="{{ old('question') }}" name="question" class="form-control"
                                        id="quesiton" placeholder="Enter Question">
                                </div>
                                <div class="form-group">
                                    <label for="answers">Answer</label>
                                    <textarea name="answer" id="answers" cols="7" rows="7" class="form-control">{{ old('answer') }}</textarea>
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
