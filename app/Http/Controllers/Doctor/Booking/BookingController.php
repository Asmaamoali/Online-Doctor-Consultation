<?php

namespace App\Http\Controllers\Doctor\Booking;

use App\Mail\ReplyMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('user')
            ->orderBy('id', "DESC")
            ->paginate();
        return view('doctor.pages.booking.index', compact('bookings'));
    }

    public function reply(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'reply_message' => 'required|string',
        ]);
        $booking = Booking::findOrFail($request->booking_id);
        Mail::to($booking->email)->send(new ReplyMail($request->reply_message));
        return back()->with('Success', 'Reply sent successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking = Booking::where('doctor_id', auth()->id())
            ->first();
        if (!$booking) {
            return back()
                ->with('Error', 'Not Found');
        }
        $booking->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
