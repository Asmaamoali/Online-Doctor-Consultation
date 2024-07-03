<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Mail\ReplyMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('doctor.category', 'doctor.subCategory', 'user')
            ->paginate();
        return view('pages.booking.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
