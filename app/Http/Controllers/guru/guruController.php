<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\information;
use App\Models\kelas;
use App\Models\murid;
use App\Models\note;
use App\Models\pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class guruController extends Controller
{
    public function indexData() {
        $me = pengajar::where('nama', Auth::user()->nama)->get('id')->all()[0];
        $class = kelas::where('pengajar_id',$me['id'])->get(['id','nama_kelas'])->all();
        if ($class == []) {
            return [
                "me" =>  $me = pengajar::where('nama', Auth::user()->nama)->get('id')->all()[0],
                "class" => "Belum Mengajar",
                "murid" => $murid = "Belum Mengajar",
                'infoA' => $infoA = information::where('tujuan', 2)->limit(5)->latest()->get()->all(),
                'infoB'=> $infoB = information::where('tujuan',3)->limit(5)->get()->all(),
            ];
        }
        else {
        $class = kelas::where('pengajar_id',$me['id'])->get(['id','nama_kelas'])->all();
            return [
                "me" =>  $me = pengajar::where('nama', Auth::user()->nama)->get('id')->all()[0],
                "class" => $class,
                "murid" => $murid = murid::where('kelas_id', $class[0]['id'])->get('nama')->all(),
                'infoA' => $infoA = information::where('tujuan', 2)->limit(5)->latest()->get()->all(),
                'infoB'=> $infoB = information::where('tujuan',3)->limit(5)->get()->all(),
            ];

        }
    }
    public function index() {
        $data = $this->indexData();
        // dd($data);
        return view('guru.index',compact('data'));
    }

    public function kelasGet() {
        if ($this->indexData()['class'] == "Belum Mengajar") {
            $classes = $this->indexData()['class'];
            // dd($classes);
            return view('guru.kelas.kelas', compact('classes'));
        }
        else {
           $classes = $this->indexData()['class'];
           return view('guru.kelas.kelas',compact('classes'));
        }
    }

    public function note() {
        $notes = note::where('penerima_id', Auth::user()->id)->orderBy('id','DESC')->paginate(5);
        return view('suAdmin.pengajar.note_get',compact('notes'));
    }

    public function kelasDetail(kelas $class) {
        $students = murid::get()->all();
        $murids = [];
        foreach ($students as $student) {
            foreach (explode(',',$student['kelas_id']) as $id) {
                if ($id == $class['id']) {
                    $murids [] = $student;
                }
            }
        }
        // dd($data);
        return view('murid.kelas.kelas_detail',compact('murids','class'));
    }
}
