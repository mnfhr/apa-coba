<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            "title" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        // $request itu sudah menerima seluruh request / inputan dari form

        // validasi data
        $validateData = $request->validate([
            "nama" => "required|max:255",
            "username" => ["required", "min:3", "max:255", "unique:users"],
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:255",
            "alamat" => "required|max:255"
        ]);

        // jika validasi data sudah benar semua, maka akan langsung menjalankan script dibawahnya

        // enkripsi password -> pakai bcrypt
        // $validateData["password"] = bcrypt($validateData['password']);

        // enkripsi password -> pakai hash
        $validateData["password"] = Hash::make($validateData['password']);

        User::create($validateData);

        // membuat flash message
        // $request->session()->flash('success', 'Registration successfull! Please login!');

        // redirect dengan mengirimkan flash message
        return redirect('/login')->with('success', 'Registration Berhasil! Silahkan login!');
    }
}
