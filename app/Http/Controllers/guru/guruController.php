<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\information;
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
            'infoA' => $infoA = information::where('tujuan', 2)->limit(5)->latest()->get()->all(),
            'infoB'=> $infoB = information::where('tujuan',3)->limit(5)->get()->all(),
        ];
    }
    public function index() {
        $data = $this->indexData();
        // dd($data);
        // dd($data);
        return view('guru.index',compact('data'));
    }

    public function kelasGet() {
        $data = $this->indexData()['class']['id'];
        $class = $this->indexData()['class']['nama_kelas'];
        $students = murid::where('kelas_id', $data)->paginate(10);
        return view('guru.kelas.kelas', compact('students','class'));
    }
}
