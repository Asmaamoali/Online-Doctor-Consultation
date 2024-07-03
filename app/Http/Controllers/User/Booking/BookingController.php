<?php

namespace App\Http\Controllers\User\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with('doctor.category', 'doctor.subCategory')
            ->orderBy('id', 'DESC')
            ->paginate();
        return view('user.pages.booking.index', compact('bookings'));
    }
}
