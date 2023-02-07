<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LaporanRepController extends Controller
{
    public function index()
    {
        return view('dashboard.resepsionis.laporan');
    }
}
