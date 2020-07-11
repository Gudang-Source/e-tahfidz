<?php

namespace App\Http\Controllers\suAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\pengajar;
use App\Models\spp;
use App\Models\feature;
use App\Models\murid;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class searchController extends Controller
{
    public function byNIS($nis) {
       return User::where('role', 'murid')->where('nis', 'LIKE', '%'.$nis.'%')->paginate(10);
    }
    public function byCLASS($class) {
        $murids = [];
        $muridss = [];
        $kelas = kelas::where('nama_kelas','LIKE', '%'.$class.'%')->get('id')->all();
        if (count($kelas) == 0) {
            Alert::warning('Tidak Ditemukan', 'Murid Dengan NIS Yang Dicari Tidak Terdaftar');
            return back();
        }
        $murid  = murid::get()->all();
        $a = User::where("role","murid")->get()->all();
        for ($i=0; $i < count($murid); $i++) { 
            $kelass = explode(',',$murid[$i]['kelas_id']);
            // dd($murid[$i]);
            for ($j=0; $j < count($kelass); $j++) { 
                if ($kelass[$j] == $kelas[0]['id']) {
                    $muridss[] = $murid[$i];
                }
            }
        }
        foreach ($a as $b) {
            foreach ($muridss as $c) {
                if ($b['nama'] == $c['nama']) {
                    $murids [] = $b;
                }
            }
        }
        if (count($murids) == 0) {
            Alert::warning('Tidak Ditemukan', 'Ditemukan Murid Yang Terdaftar Pada Kelas Ini');
            return back();
        }
        return $murids = array_unique($murids);
    }
    public function murid(Request $request) {
        $paging = true;
        $result = User::where('role', 'murid')->where('nama', 'LIKE', '%'.$request->input.'%')->paginate(10);
        $murids = (count($result)!== 0) ?  $result = User::where('role', 'murid')->where('nama', 'LIKE', '%'.$request->input.'%')->paginate(10)  
        :  $result = User::where('role', 'murid')->where('alamat', 'LIKE', '%'.$request->input.'%')->paginate(10); ;
        if (count($murids) == 0) {
            $murids = $this->byNIS($request->input); 
            // dd($murids);
        }
        if (count($murids) == 0) {
           $murids = $this->byCLASS($request->input);
            $paging = false;
        }
        return view('suAdmin.murid.murid', compact('murids','paging'));
    }
    public function pengajar(Request $request) {
        $murids = User::orderBy('id','DESC')->where('role', 'pengajar')->where('nama', 'LIKE', '%'.$request->input.'%')->paginate(10);
        return view('suAdmin.pengajar.pengajar', compact('murids'));
    }
    public function kelas(Request $request) {
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        $classes = kelas::orderBy('id', 'DESC')->where('nama_kelas','LIKE','%'.$request->input.'%')->paginate(10);
        return view('suAdmin.kelas.kelas', compact('classes', 'teachs'));
    }
    public function spp(Request $request) {
        $spp = feature::where('nama_fitur', 'spp')->get()->all();
        $murids = spp::orderBy('id', 'DESC')->where('nama','LIKE','%'.$request->input.'%')->paginate(10);
        return view('suAdmin.fitur.spp', compact('murids','spp'));
    }
}
