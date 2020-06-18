<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\murid;
use App\Models\pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class guruController extends Controller
{
    public function indexData() {
        return [
          "me" =>  $me = pengajar::where('nama', Auth::user()->nama)->get('id')->all()[0],
           "class" => $class = kelas::where('pengajar_id',$me['id'])->get(['id','nama_kelas'])->all()[0],
            "murid" => $murid = murid::where('kelas_id', $class['id'])->get('nama')->all(),
        ];
    }
    public function index() {
        $data = $this->indexData();
        // dd($data);
        return view('guru.index',compact('data'));
    }
}
