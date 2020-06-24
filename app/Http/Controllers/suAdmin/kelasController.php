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
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        $classes = kelas::orderBy('id', 'DESC')->paginate(10);
        return view('suAdmin.kelas.kelas',compact('teachs','classes'));
    }
   
    public function kelasPost(kelasRequest $request) {
        kelas::create([
            "nama_kelas" => $request->kelas,
            "pengajar_id" => $request->pengajar,
            "angkatan" => $request->angkatan
        ]);
        $pengajar = new pengajar();
        session()->flash('update', $request->pengajar);
        event(new pengajarEvent($pengajar));
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

    public function kelasUpdate(kelasRequest $request, kelas $class) {
        $pengajar = new pengajar();
        $pengajar3 = pengajar::where('id', $request->pengajar_baru)->get()->all();
        $pengajar_id = null;
        if (isset($request->pengajar_baru)) {
            $pengajar_id = $request->pengajar_baru;
        }
        else {
            $pengajar_id = $request->pengajar_lama;
        }
        session()->flash('data', $class['pengajar_id']);
        event(new hapusKelas($pengajar) );
        if (!isset($request->pengajar_baru)) {
            $pengajar2 = pengajar::where('id', $request->pengajar_lama)->get()->all();
            $pengajar2[0]->update([
                "status" => "aktiv"
            ]);
        }
        else {  
            $pengajar3[0]->update([
                "status" => "aktiv"
            ]);
        }
        $class->update([
            "nama_kelas" => $request->kelas,
            "pengajar_id" => $pengajar_id
        ]);
        
        Alert::success('Berhasil', 'Data Kelas '.$request->kelas.' Berhasil Diupdate');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function tambahMurid(kelas $class) {
        $students = murid::where('kelas_id',null)->get()->all();
        $murids = murid::where('kelas_id', $class['id'])->paginate(10);
        $jumlah = murid::where('kelas_id', $class['id'])->get()->all();
        return view('suAdmin.kelas.kelas_detail', compact('students','class', 'murids', 'jumlah'));
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
       foreach ($hasil as $hsl) {
            $hsl[0]->update([
                "kelas_id" => $class['id']
            ]);
       }
       Alert::success('Berhasil', 'Murid Berhasil Ditambahkan');
    //    return redirect()->route('suAdmin.kelas.get');
        return back();
    }

    public function dropMurid(murid $murid, kelas $class) {
        $murid->update([
            "kelas_id" => null
        ]);
        Alert::success('Berhasil', 'Murid Berhasil Dikeluarkan');
        return back();
    }
}
