<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createID(TipeKamar $id)
    {
        return view('booking.create', [
            "title" => "Booking",
            "tipe_kamar" => $id,
        ]);
    }

    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_pemesan" => "required|max:255",
            "no_hp" => "required|numeric",
            "email" => "required|email",
            "jml_kamar" => "required|integer",
            'tgl_checkin' => 'required|date|after:tomorrow',
            'tgl_checkout' => 'required|date|after:tgl_checkin',
        ]);

        if ($request->jml_kamar <= $request->stok) {
            $validatedData["user_id"] = $request->user_id;
            $validatedData["tipe_kamar_id"] = $request->tipe_kamar_id;

            $validatedData["total"] = $this->jarakHari($request->tgl_checkin, $request->tgl_checkout) * $request->harga * $request->jml_kamar;

            if ($request->payby == "ONSITE") {
                $validatedData["PayBy"] = "ONSITE";
                $validatedData["PayEnd"] = 0;
                $validatedData["status"] = "DISETUJUI";
            } else {
                $validatedData["PayBy"] = "ONLINE";
                $validatedData["PayEnd"] = 1;
                $validatedData["status"] = "DIBAYAR";
            }

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $validatedData["kode_booking"] = date('dmy') . $this->generate_string($permitted_chars, 6) . date('His');

            $stok = $request->stok - $request->jml_kamar;

            $onbook = $this->konfersiOnbook($request->onbook);

            $jml_onbook = $onbook + $request->jml_kamar;

            BookingList::create($validatedData);
            TipeKamar::where('id', $request->tipe_kamar_id)
                ->update([
                    'stok' => $stok,
                    'onbook' => $jml_onbook,
                ]);

            return redirect('/mybookinglist/' . $request->user_id)->with('success', 'Booking Berhasil! Simpan Kartu Pesanan ini!');
        } else {
            return redirect('/tipeKamar/' . $request->tipe_kamar_id)->with('penuh', 'Maaf! Seluruh kamar ini telah dibooking!');;
        }
    }

    public function jarakHari($tgl_checkin, $tgl_checkout)
    {
        $tgl1 = strtotime($tgl_checkin);
        $tgl2 = strtotime($tgl_checkout);
        $jarak = $tgl2 - $tgl1;
        $hari = $jarak / 60 / 60 / 24;
        return $hari;
    }

    public function konfersiOnbook($onbook)
    {
        if ($onbook == null) {
            return 0;
        } else {
            return $onbook;
        }
    }

    public function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}
