<?php

namespace App\Http\Controllers\murid;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\information;
use App\Models\kelas;
use App\Models\murid;
use App\Models\note;
use App\Models\spp;
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
           "kelas" => explode(',',$data['kelas'][0]['kelas_id'])
       ]);
    }

    public function note() {
        $notes = note::where('penerima_id',Auth::user()->id)->orderBy('id','DESC')->paginate(5);
        return view('murid.notes.notes',compact('notes'));
    }

    public function classData() {
        $me = murid::where('nama', Auth::user()->nama)->get()->all();
        $tes = murid::where('nama', Auth::user()->nama)->get()->all()[0]['kelas_id'];
        $tes = explode(',',$tes);
        $students = murid::get()->all();
        $b = [];
        $class = [];
       for ($i=0; $i < count($tes); $i++) { 
            $a = kelas::where('id', $tes[$i])->get()->all();
            $class [] = $a;
       }
      foreach ($students as $stud) {
            foreach (explode(',',$stud['kelas_id']) as $stu) {
                foreach ($tes as $ts) {
                    if ($stu == $ts) {
                        $b [] = $stud;
                    }
                }
            }
      }
        // dd($class);
        if ($class !== []) {
            return [
                "me" => array_unique($b),
                "tes" => $tes,
                "students" => $students = murid::where('kelas_id', $me[0]['kelas_id'])->get()->all(),
                "class" => $class,
            ];
        }
        else {
            return [
                "me" => $me  ,
                "class" => "Kamu Belum Masuk Kelas",
            ];
        }
        
    }

    public function class() {
        $data = $this->classData();
        // dd($data);
        return view('murid.kelas.kelas',[
            "classes" => $data['class'],
        ]); 
    }

    public function spp() {
        $murid = spp::where('nama', Auth::user()->nama)->get()->all()[0];
        return view('murid.spp.spp',compact('murid'));
    }

    public function classDetail(kelas $class) {
        $students = murid::get()->all();
        $data = [];
        foreach ($students as $student) {
            foreach (explode(',',$student['kelas_id']) as $id) {
                if ($id == $class['id']) {
                    $data [] = $student;
                }
            }
        }
        return view('murid.kelas.kelas_detail',compact('data','class'));
    }
}
