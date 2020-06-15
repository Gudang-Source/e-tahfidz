<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use App\Models\r_pending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class authController extends Controller
{
    public function getLogin() {
        return view('auth.login');
    }
    public function postLogin(Request $request) {
        $request->validate([
            "email" => ['required'],
            "password" => ['required']
        ]);
        if (Auth::attempt(['email' => $request->email, "password" => $request->password, "role" => "super_admin"])) {
           return redirect()->route('suAdmin.index');
        }
    }
    public function getRegister() {
        return view('auth.register');
    }
    public function postRegister(authRequest $request) {
        // dd($request->all());
        r_pending::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => $request->password
        ]);
        Alert::success('Berhasil', 'Kamu Berhasil Registrasi, Harap Tunggu Konfirmasi Dari Admin');
        return redirect()->route('login');
    }
}
