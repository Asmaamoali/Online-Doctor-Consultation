@extends('layouts.app')
@section('title', 'Edit FAQ')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit FAQ</h3>
                        </div>
                        <form method="POST" action="{{ route('faqs.update', $faq->id) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="quesiton">Question</label>
                                    <input type="text" value="{{ old('question', $faq->question) }}" name="question"
                                        class="form-control" id="quesiton" placeholder="Enter Question">
                                </div>
                                <div class="form-group">
                                    <label for="answers">Answer</label>
                                    <textarea name="answer" id="answers" cols="7" rows="7" class="form-control">{{ old('answer', $faq->answer) }}</textarea>
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
