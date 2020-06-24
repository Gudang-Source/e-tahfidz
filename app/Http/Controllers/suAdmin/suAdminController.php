<?php

namespace App\Http\Controllers\suAdmin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use App\Http\Requests\editPengajarRequest;
use App\Http\Requests\infoRequest;
use App\Http\Requests\kelasRequest;
use App\Http\Requests\pengajarRequest;
use App\Models\information;
use App\Models\visible;
use Illuminate\Http\Request;
use App\User;
use App\Models\pengajar;
use App\Models\kelas;
use App\Events\pengajarEvent;
use App\Events\hapusKelas;
use App\Events\t_pengajarEvent;
use App\Models\r_pending;
use App\Models\murid;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use App\Models\note;
use App\Models\spp;
use RealRashid\SweetAlert\Facades\Alert;

class suAdminController extends Controller
{
    public function indexData() {
       return [
        "visibles" => $visibles = visible::get()->all(),
        "pengajar" => $pengajar = pengajar::get()->all(),
        "murid" => $murid = murid::get()->all(),
        "class" => $class = kelas::get()->all(),
        "info" => $info = information::orderBy('id','DESC')->limit(5)->latest()->get(),
    ];
    }

    public function index() {
        $data = $this->indexData();
        return view('suAdmin.index', [
            "visibles" => $data['visibles'],
            "pengajar" => $data['pengajar'],
            "murid" => $data['murid'],
            "class" => $data['class'],
            "info" => $data['info'],
        ]);
    }
   

    

    

    public function noteGet(murid $murid) {
        return view('suAdmin.note.note',compact('murid'));
    }

    public function notePost(Request $request, murid $murid) {
        $request->validate([
            "catatan" => ['required']
        ]);
        $user = User::where('nama', $murid['nama'])->get()->all();
        note::create([
            "penerima_id" => $user[0]['id'],
            "pengirim_id" => Auth::user()->id,
            "note" => $request->catatan
        ]);
        Alert::success('Berhasil', 'Catatan Berhasil Dikirim');
        return back();
    }

    public function pendingGet() {
        $pendings = r_pending::orderBy('id','DESC')->paginate(10);
        return view('suAdmin.pending.pending',compact('pendings'));
    }

    public function bulan() {
        return [
            [
                "bulan" => "Januari",
                "Januari" => "Belum Bayar"
            ],
            [
                "bulan" => "Februari",
                "Februari" => "Belum Bayar"
            ],
            [
                "bulan" => "Maret",
                "Maret" => "Belum Bayar"
            ],
            [
                "bulan" => "April",
                "April" => "Belum Bayar"
            ],
            [
                "bulan" => "Mei",
                "Mei" => "Belum Bayar"
            ],
            [
                "bulan" => "Juni",
                "Juni" => "Belum Bayar"
            ],
            [
                "bulan" => "Juli",
                "Juli" => "Belum Bayar"
            ],
            [
                "bulan" => "Agustus",
                "Agustus" => "Belum Bayar"
            ],
            [
                "bulan" => "September",
                "September" => "Belum Bayar"
            ],
            [
                "bulan" => "Oktober",
                "Oktober" => "Belum Bayar"
            ],
            [
                "bulan" => "November",
                "November" => "Belum Bayar"
            ],
            [
                "bulan" => "Desember",
                "Desember" => "Belum Bayar"
            ],
            
        ];
    }
    public function emailNotif(r_pending $pending) {
        $a = Mail::to($pending['email'])->send(new ConfirmationEmail());
        $spp = $this->bulan();
        session()->flash('nama', $pending['nama']);
        User::create([
            "nama" => $pending['nama'],
            "email" => $pending['email'],
            "password" => bcrypt($pending['password']),
            "role" => 'murid'
        ]);
        murid::create([
            "nama" => $pending['nama'],
            "kelas_id" => null
        ]);
        spp::create([
            "nama" => $pending['nama'],
            "tahun" => date('Y'),
        ]);
        $pending->delete();
        Alert::success('Berhasil', 'Email Telah Dikirimkan');
        return back();
    }

    public function muridGet() {
        $murids = User::where("role", 'murid')->paginate(10);
        return view('suAdmin.murid.murid',compact('murids'));
    }

    public function muridDestroy(User $murid) {
        $murids = murid::where('nama', $murid['nama'])->get()->all();
        $spp = spp::where('nama', $murid['nama'])->get()->all();
        $murids[0]->delete();
        $spp[0]->delete();
        $murid->delete();
        Alert::success('Berhasil', 'Murid Berhasil Dihapus');
        return redirect()->route('suAdmin.murid.get');
    }

    public function muridEdit(User $murid) {
        return view('suAdmin.murid.muridEdit',compact('murid'));
    }

    public function muridUpdate(Request $request, User $murid) {
        $request->validate([
            "email" => ['required', 'unique:users,email']
        ]);
        $murid->update([
            "email" => $request->email
        ]);
        Alert::success('Berhasil', 'Data Murid '.$request->nama.' Berhasil Diupdate');
        return back();
    }

    public function muridEditPw(Request $request, User $murid) {
        $request->validate([
            "password" => ['required','confirmed'],
            "password_confirmation" => ['required']
        ]);
        $murid->update([
            "password" => bcrypt($request->password)
        ]);
        Alert::success('Berhasil', 'Password Murid '.$murid['nama'].' Berhasil Diganti');
        return back();
    }
}
