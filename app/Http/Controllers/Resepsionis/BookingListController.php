<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function index()
    {
        $pesanan = BookingList::all();
        return view('dashboard.resepsionis.index', [
            "search" => true,
            "pesanan" => $pesanan
        ]);
    }

    public function search(Request $request)
    {
        return view('dashboard.resepsionis.index', [
            "search" => true,
            "pesanan" => BookingList::with(['tipeKamars'])->where('kode_booking', $request->kode)->get(),
            "kode" => $request->kode,
        ]);
    }

    public function bayar(Request $request)
    {
        BookingList::where('kode_booking', $request->kode)
            ->update([
                'PayEnd' => 1,
                'status' => "DIBAYAR"
            ]);

        $request->session()->flash('success', 'Pembayaran berhasil!');

        return view('dashboard.resepsionis.index', [
            "search" => true,
            "pesanan" => BookingList::with(['tipeKamars'])->where('kode_booking', $request->kode)->get(),
            "kode" => $request->kode,
        ]);
    }

    public function checkin(Request $request)
    {
        $onbook = $this->konfersiOnbook($request->onbook);
        $onuse = $this->konfersiOnuse($request->onuse);

        $jml_onbook = $onbook - $request->jml_kamar;
        $jml_onuse = $onuse + $request->jml_kamar;

        BookingList::where('kode_booking', $request->kode)
            ->update([
                'status' => "CHECKIN"
            ]);

        TipeKamar::where('id', $request->id_kamar)
            ->update([
                'onbook' => $jml_onbook,
                'onuse' => $jml_onuse
            ]);

        $request->session()->flash('success', 'Check-in berhasil!');

        return view('dashboard.resepsionis.index', [
            "search" => true,
            "pesanan" => BookingList::with(['tipeKamars'])->where('kode_booking', $request->kode)->get(),
            "kode" => $request->kode,
        ]);
    }

    public function checkout(Request $request)
    {
        $onuse = $this->konfersiOnuse($request->onuse);
        $jml_onuse = $onuse - $request->jml_kamar;

        $stok = $request->stok + $request->jml_kamar;

        BookingList::where('kode_booking', $request->kode)
            ->update([
                'status' => "SUKSES"
            ]);

        TipeKamar::where('id', $request->id_kamar)
            ->update([
                'onuse' => $jml_onuse,
                'stok' => $stok,
            ]);

        $request->session()->flash('success', 'Check-out berhasil! Terimakasih atas kunjungannya!');

        return view('dashboard.resepsionis.index', [
            "search" => true,
            "pesanan" => BookingList::with(['tipeKamars'])->where('kode_booking', $request->kode)->get(),
            "kode" => $request->kode,
        ]);
    }

    public function konfersiOnbook($onbook)
    {
        if ($onbook == null) {
            return 0;
        } else {
            return $onbook;
        }
    }

    public function konfersiOnuse($onuse)
    {
        if ($onuse == null) {
            return 0;
        } else {
            return $onuse;
        }
    }
}
