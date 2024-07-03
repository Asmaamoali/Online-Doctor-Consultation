@extends('user.layouts.app')

@section('title', 'Consultations')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Consultations</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Patient</th>
                                        <th>Message</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->description }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary btn-reply" data-toggle="modal"
                                                        data-target="#replyModal{{ $booking->id }}"
                                                        data-id="{{ $booking->id }}">
                                                        Reply
                                                    </button>
                                                    <form action="{{ route('doctor.bookings.destroy', $booking->id) }}"
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
                                        <div class="modal fade" id="replyModal{{ $booking->id }}" tabindex="-1"
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
                                                    <form action="{{ route('doctor.bookings.reply') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="booking_id" id="booking_id"
                                                                value="{{ $booking->id }}">
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
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reply Modal -->

@endsection
