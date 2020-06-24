<?php

namespace App\Http\Controllers\suAdmin;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\infoRequest;
use App\Models\information;

use Illuminate\Http\Request;

class infoController extends Controller
{
    public function info(infoRequest $request) {
        information::create([
            "judul" => $request->judul,
            "info" => $request->info,
            "tujuan" => $request->tujuan,
            "tanggal" => date('d-F-Y'),
            "informan" => Auth::user()->id
        ]);
        return redirect()->route('suAdmin.index');
    }

    public function infoDestroy(information $inf) {
        $inf->delete();
        Alert::success('Berhasil', 'Pengumuman Berhasil Dihapus');
        return back();
    }

    public function infoEdit(information $inf) {
        return view('suAdmin.info.info_edit',compact('inf'));
    }

    public function infoUpdate(Request $request, information $inf) {
        $inf->update([
            "info" => $request->info
        ]);
        Alert::success('Berhasil', 'Informasi Berhasil DiUpdate');
        return back();
    }
}
