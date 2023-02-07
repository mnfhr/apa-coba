<?php

namespace App\Http\Controllers\Admin;

use App\Models\TipeKamar;
use App\Http\Controllers\Controller;
use App\Models\FasilitasKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tipe-kamar.index', [
            "tipe_kamars" => TipeKamar::with(['fasilitasKamars'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tipe-kamar.create', [
            "fkamars" => FasilitasKamar::all(),
        ]);
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
            "harga" => "required",
            "stok" => "required",
            "fasilitas" => "required",
            "img" => "image|file|max:1024",
        ]);

        if ($request->file('img')) {
            $validatedData["img"] = $request->file('img')->store('foto-kamar');
        }

        $tipeKamar = TipeKamar::create($validatedData);

        $tipeKamar->fasilitasKamars()->attach($request->fasilitas);

        return redirect('/admin/tipe-kamar')->with('success', 'Kamar baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function show(TipeKamar $tipeKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKamar $tipeKamar)
    {
        return view('dashboard.tipe-kamar.edit', [
            'tipe_kamar' => TipeKamar::with(['fasilitasKamars'])->findOrFail($tipeKamar->id),
            'fkamars' => FasilitasKamar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKamar $tipeKamar)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "harga" => "required",
            "stok" => "required",
            "img" => "image|file|max:1024",
        ]);

        if ($request->file('img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData["img"] = $request->file('img')->store('foto-kamar');
        }

        TipeKamar::where('id', $tipeKamar->id)
            ->update($validatedData);

        $tipeKamar->fasilitasKamars()->sync($request->fasilitas);

        return redirect('/admin/tipe-kamar')->with('success', 'Kamar telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKamar $tipeKamar)
    {
        if ($tipeKamar->img) {
            Storage::delete($tipeKamar->img);
        }

        TipeKamar::destroy($tipeKamar->id);

        $tipeKamar->fasilitasKamars()->detach($tipeKamar->id);

        return redirect('/admin/tipe-kamar')->with('success', 'Kamar telah dihapus!');
    }
}
