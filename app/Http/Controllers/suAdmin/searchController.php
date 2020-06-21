<?php

namespace App\Http\Controllers\suAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\pengajar;
use App\User;

class searchController extends Controller
{
    public function murid(Request $request) {
        $murids = User::where('role', 'murid')->where('nama', 'LIKE', '%'.$request->input.'%')->paginate(10);
        return view('suAdmin.murid.murid', compact('murids'));
    }
    public function pengajar(Request $request) {
        $pengajar = User::orderBy('id','DESC')->where('role', 'pengajar')->where('nama', 'LIKE', '%'.$request->input.'%')->paginate(10);
        return view('suAdmin.pengajar.pengajar', compact('pengajar'));
    }
    public function kelas(Request $request) {
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        $classes = kelas::orderBy('id', 'DESC')->where('nama_kelas','LIKE','%'.$request->input.'%')->paginate(10);
        return view('suAdmin.kelas.kelas', compact('classes', 'teachs'));
    }
}
