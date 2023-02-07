<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;

class KamarListController extends Controller
{
    public function index()
    {
        return view('kamars', [
            "title" => "Kamar",
            "tipe_kamars" => TipeKamar::all(),
        ]);
    }

    public function show(TipeKamar $id)
    {
        return view('kamar', [
            "title" => "Details Room",
            'tipe_kamar' => TipeKamar::with(['fasilitasKamars'])->findOrFail($id->id),
        ]);
    }
}
