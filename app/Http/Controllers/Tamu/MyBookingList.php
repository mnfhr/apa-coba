<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\User;
use Illuminate\Http\Request;

class MyBookingList extends Controller
{
    public function show($user_id)
    {
        return view('booking.mybooking', [
            "title" => "My Booking List",
            "booking_lists" => BookingList::with(['tipeKamars'])->latest()->where('user_id', $user_id)->get(),
            "user" => User::findOrFail($user_id),
        ]);
    }

    public function print($id)
    {
        return view('booking.print', [
            "booking" => BookingList::with(['tipeKamars'])->where('id', $id)->get(),
        ]);
    }
}
