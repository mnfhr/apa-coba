<?php

namespace App\Http\Controllers\Admin;

use App\Models\FasilitasKamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FkamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.fasilitas-kamar.index', [
            'fkamars' => FasilitasKamar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.fasilitas-kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "img" => "image|file|max:1024",
        ]);

        if ($request->file('img')) {
            $validatedData["img"] = $request->file('img')->store('foto-fasilitas-kamar');
        }

        FasilitasKamar::create($validatedData);

        return redirect('/admin/fasilitas-kamar')->with('success', 'Fasilitas kamar baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitasKamar)
    {
        return view('dashboard.fasilitas-kamar.edit', [
            'fkamar' => $fasilitasKamar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasKamar $fasilitasKamar)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "img" => "image|file|max:1024",
        ]);

        if ($request->file('img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData["img"] = $request->file('img')->store('foto-fasilitas-kamar');
        }

        FasilitasKamar::where('id', $fasilitasKamar->id)
            ->update($validatedData);

        return redirect('/admin/fasilitas-kamar')->with('success', 'Fasilitas kamar telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        if ($fasilitasKamar->img) {
            Storage::delete($fasilitasKamar->img);
        }

        FasilitasKamar::destroy($fasilitasKamar->id);
        return redirect('/admin/fasilitas-kamar')->with('success', 'Fasilitas kamar telah dihapus!');
    }
}
