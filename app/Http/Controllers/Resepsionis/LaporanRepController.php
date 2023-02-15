<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use Illuminate\Http\Request;

class LaporanRepController extends Controller
{
    public function index()
    {
        $laporan = BookingList::all();
        return view('dashboard.resepsionis.laporan', compact('laporan'));
    }
}
