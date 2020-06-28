<?php

namespace App\Http\Controllers\suAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengajar;
use App\Models\kelas;
use App\Http\Requests\kelasRequest;
use App\Events\pengajarEvent;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\murid;
use App\Events\hapusKelas;

class kelasController extends Controller
{
    public function kelasGet() {
        $teachs = pengajar::get()->all();
        $classes = kelas::orderBy('id', 'DESC')->paginate(10);
        return view('suAdmin.kelas.kelas',compact('teachs','classes'));
    }
   
    public function kelasPost(kelasRequest $request) {
        kelas::create([
            "nama_kelas" => $request->kelas,
            "pengajar_id" => $request->pengajar,
            "angkatan" => $request->angkatan
        ]);
        Alert::success('Berhasil', 'Kelas Berhasil Dibuat');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function kelasDestroy(kelas $class) {
        $pengajar = new pengajar();
        $murids = murid::where('kelas_id', $class['id'])->get()->all();
        foreach ($murids as $murid) {
            $murid->update([
                "kelas_id" => null
            ]);
        }
        session()->flash('data', $class['pengajar_id']);
        event(new hapusKelas($pengajar) );
        $class->delete();
        Alert::success('Berhasil', 'Kelas Berhasil Dihapus');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function kelasEdit(kelas $class) {
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        return view('suAdmin.kelas.kelas_edit',compact('class', 'teachs'));
    }

   public function kelasUpdate(kelas $class, Request $request) {
    //    dd($request->all());
       $class->update([
           "nama_kelas" => $request->kelas,
           "pengajar_id" => $request->pengajar_baru
       ]);
       Alert::success('Berhasil', 'Data Kelas Berhasil Diupdate');
       return redirect()->route('suAdmin.kelas.get');
   }

    public function tambahMurid(kelas $class) {
        $students = murid::get()->all();
        $murids = [];
        foreach ($students as $student) {
            $kelas = explode(',',$student['kelas_id']);
            foreach ($kelas as $id) {
                if ($id == $class['id']) {
                     $murids [] = $student;
                }
            }
        }
        session()->flash('class', $class['id']);
        // $students = murid::get()->all();
        // $murids = murid::where('kelas_id', $class['id'])->paginate(10);
        // $jumlah = murid::where('kelas_id', $class['id'])->get()->all();
        return view('suAdmin.kelas.kelas_detail', compact('students','class', 'murids'));
    }

    public function tambahMurid2(kelas $class, Request $request) {
        $request->validate([
            "murid" => ['required']
        ]);
       $hasil = [];
       $murid = $request->murid;
       foreach ($murid as $mrd) {
           $cari = murid::where('id', $mrd)->get()->all();
           $hasil [] = $cari;
       }
    //    dd($hasil);
       foreach ($hasil as $hsl) {
        if ($hsl[0]['kelas_id'] == null) {
            $hsl[0]->update([
                "kelas_id" => $class['id']
            ]);
        }
        else {
            $dec = explode(',',$hsl[0]['kelas_id']);
            $push = array_push($dec,$class['id']);
            // dd($dec);
            $hsl[0]->update([
                "kelas_id" => implode(',', $dec)
            ]);
        }
        
       }
       Alert::success('Berhasil', 'Murid Berhasil Ditambahkan');
    //    return redirect()->route('suAdmin.kelas.get');
        return back();
    }

    public function dropMurid(murid $murid, kelas $class) {
        $dec = explode(',', $murid['kelas_id']);
      for ($i=0; $i < count($dec); $i++) { 
          if($dec[$i] == session('class')) {
            unset($dec[$i]);
          }
      }
    //   dd($dec);
      $murid->update([
          "kelas_id" => implode(',',$dec),
      ]);
      Alert::success('Berhasil', 'Murid Berhasil DiKeluarkan');
      return back(); 
    }
}
