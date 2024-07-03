@extends('layouts.app')

@section('title', 'Messages')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Messages</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary btn-reply" data-toggle="modal"
                                                        data-target="#replyModal{{ $message->id }}"
                                                        data-id="{{ $message->id }}">
                                                        Reply
                                                    </button>
                                                    <form action="{{ route('messages.delete', $message->id) }}"
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
                                        <div class="modal fade" id="replyModal{{ $message->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="replyModalLabel">Reply to User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('messages.reply') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="contact_id" id="contact_id"
                                                                value="{{ $message->id }}">
                                                            <div class="form-group">
                                                                <label for="replyMessage">Message</label>
                                                                <textarea class="form-control" id="replyMessage" name="reply_message" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send
                                                                Reply</button>
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
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reply Modal -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-reply').on('click', function() {
                var bookingId = $(this).data('id');
                $('#booking_id').val(bookingId);
            });
        });
    </script>
@endsection
