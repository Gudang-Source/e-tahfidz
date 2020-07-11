<?php

namespace App\Http\Controllers\suAdmin;

use App\Http\Controllers\Controller;
use App\Models\feature;
use App\Models\iklan;
use App\Models\murid;
use App\Models\spp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class featureController extends Controller
{
    public function fiturGet() {
        $stat = feature::get('status')->all();
        return view('suAdmin.fitur.fitur',compact('stat'));
    }
    public function fiturPost(Request $request) {
        $ftr = feature::get()->all();
       $ftr[0]->update([
           "status" => $request->iklan
       ]);
       $ftr[1]->update([
           "status" => $request->spp
       ]);
       Alert::success('success', 'Perubahan Status Fitur Berhasil');
       return redirect()->route('suAdmin.fitur');
    }
    public function iklanGet() {
        $iklan = feature::where('nama_fitur', 'iklan')->get()->all();
        $gambar = iklan::get()->all();
        return view('suAdmin.fitur.iklan',compact('iklan','gambar'));
    }
    public function iklanPost(Request $request) {
        $request->validate([
            "gambar" => ['required'],
        ]);
        $iklan = $request->file('gambar')->store('iklan');
        iklan::create([
            "gambar" => $iklan,
            "status" => "non-checked"
        ]);
        Alert::success('Berhasil', 'Gambar Iklan Berhasil Ditambahkan');
        return back();
    }
    public function iklanGambar(Request $request) {
        // dd($request->all());
        $req = $request->pilihan;
        $res = $request->tidak;
        $datas = [];
        $datas2 = [];
        if ($req !== null) {
            foreach ($req as $re) {
                $data = iklan::where('id', $re)->get()->all();
                $datas[] = $data;
            }
            foreach ($datas as $data) {
                $data[0]->update([
                    "status" => "checked"
                ]);
            }
        }
        else {
            
        }
        if ($res !== null) {
            foreach ($res as $re2) {
                $data2 = iklan::where('id', $re2)->get()->all();
                $datas2[] = $data2;
            }
            foreach ($datas2 as $data2) {
                $data2[0]->update([
                    "status" => "non-checked"
                ]);
            }
        }
        else {
            
        }
        Alert::success('Berhasil', 'Gambar Iklan Berhasil Dipilih');
        return back();
    }
    public function iklanDelete(Request $request) {
        $gambar = $request;
        $data = []; 
        foreach ($gambar->hapus as $gb) {
            Storage::delete($gb);
            $a = iklan::where('gambar',$gb)->get()->all();
            foreach ($a as $b) {
                $b->delete();
            }
        }       
        Alert::success('Berhasil', 'Gambar Berhasil Dihapus');
        return back();
    }
    public function sppGet() {
        $spp = feature::where('nama_fitur', 'spp')->get()->all();
        $murids = spp::where('tahun', date('Y'))->paginate(10);
        if (count($murids) < 1) {
            $data1 = murid::get()->all();
            foreach ($data1 as $dat1) {
                spp::create([
                    "nama" => $dat1['nama'],
                    "tahun" => date('Y'),
                    "januari" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "februari" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "maret" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "april" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "mei" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "juni" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "juli" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "agustus" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "september" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "oktober" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "november" => json_encode(["Belum Bayar", "Balum Bayar"]),
                    "desember" => json_encode(["Belum Bayar", "Balum Bayar"]),
                ]);
            }
        }
        return view('suAdmin.fitur.spp',compact('spp','murids'));
    }
    public function sppBayar(spp $murid) {
        return view('suAdmin.fitur.spp_bayar',compact('murid'));
    }
    public function sppBayar2(Request $request, spp $murid) {
        $murid->update([
            $request->bulan => json_encode(["Lunas", $request->pesan])
        ]);
        Alert::success('Berhasil', 'SPP bulan'.$request->bulan.'Sudah Lunas');
        return back();
    }
}
