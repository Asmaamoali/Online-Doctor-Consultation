<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingCount = Booking::where('user_id', auth()->id())
            ->count();
        return view('user.pages.home.index', compact('bookingCount'));
    }
}
