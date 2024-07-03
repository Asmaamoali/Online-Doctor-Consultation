<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingCount = Booking::where('doctor_id', auth()->id())
            ->count();
        return view('doctor.pages.home.index', compact('bookingCount'));
    }
}
