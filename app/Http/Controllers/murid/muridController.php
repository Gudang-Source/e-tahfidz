<?php

namespace App\Http\Controllers\murid;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\information;
use App\Models\kelas;
use App\Models\murid;
use App\Models\note;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class muridController extends Controller
{

    public function indexData() {
        return [
            "info" => information::where('tujuan', 3)->latest()->limit(5)->get(),
            "kelas" => murid::where('nama', Auth::user()->nama)->get('kelas_id')->all(),
        ];
    }

    public function index() {
        $data = $this->indexData();
       return view('murid.index', [
           "info" => $data['info'],
           "kelas" => $data['kelas']
       ]);
    }

    public function note() {
        $notes = note::where('penerima_id',Auth::user()->id)->paginate(5);
        return view('murid.notes.notes',compact('notes'));
    }

    public function classData() {
        $me = murid::where('nama', Auth::user()->nama)->get()->all();
        $class = kelas::where('id', $me[0]['kelas_id'])->get()->all();
        // dd($class);
        if ($class !== []) {
            return [
                "me" => $me  ,
                "students" => $students = murid::where('kelas_id', $me[0]['kelas_id'])->get()->all(),
                "class" => $class,
                "pengajar" => $pengajar = User::where('id', $class[0]['pengajar_id'])->get()->all(),
            ];
        }
        else {
            return [
                "me" => $me  ,
                "students" => $students = murid::where('kelas_id', $me[0]['kelas_id'])->get()->all(),
                "class" => $class,
                "pengajar" => "Kamu Belum Masuk Kelas",
            ];
        }
        
    }

    public function class() {
        $data = $this->classData();
        return view('murid.kelas.kelas',[
            "students" => $data['students'],
            "class" => $data['class'],
            "pengajar" => $data['pengajar']
        ]); 
    }
}
