<?php

namespace App\Http\Controllers\suAdmin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use App\Http\Requests\infoRequest;
use App\Http\Requests\kelasRequest;
use App\Models\information;
use App\Models\visible;
use Illuminate\Http\Request;
use App\User;
use App\Models\pengajar;
use App\Models\kelas;
use App\Events\pengajarEvent;
use App\Events\hapusKelas;
use App\Models\r_pending;
use App\Models\murid;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use RealRashid\SweetAlert\Facades\Alert;

class suAdminController extends Controller
{
    public function index() {
        $visibles = visible::get()->all();
        $info = information::orderBy('id','DESC')->paginate(5);
        return view('suAdmin.index', compact('visibles','info'));
    }
    public function info(infoRequest $request) {
        information::create([
            "judul" => $request->judul,
            "info" => $request->info,
            "tujuan" => $request->tujuan,
            "tanggal" => date('d-F-Y'),
            "informan" => Auth::user()->id
        ]);
        return redirect()->route('suAdmin.index');
    }

    public function pengajarGet() {
        $pengajar = User::orderBy('id','DESC')->where('role', 'pengajar')->paginate(10);
        return view('suAdmin.pengajar',compact('pengajar'));
    }
    public function pengajarPost(authRequest $request) {
        User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => "pengajar"
        ]);
        pengajar::create([
            "nama" => $request->nama,
            "status" => "non-aktiv"
        ]);
        Alert::success('Berhasil', 'Data Sudah Disimpan');
        return redirect()->route('suAdmin.pengajar.get');
    }

    public function pengajarDestroy(User $pjr) {
        $pengajar = pengajar::where('nama', $pjr['nama'])->get()->all();
        $pengajar[0]->delete();
        $pjr->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('suAdmin.pengajar.get');
    }

    public function pengajarEdit(User $pjr) {
        return view('suAdmin.pengajar_edit',compact('pjr'));
    }

    public function pengajarUpdate(User $pjr, Request $request) {
        $pjr->update([
            "nama" => $request->nama,
            "email" => $request->email,
        ]);
        Alert::success('Berhasil', 'Data Pengajar '.$pjr['nama'].' Berhasil Diupdate');
        return redirect()->route('suAdmin.pengajar.get');
    }
    public function editPassword(Request $request, User $pjr) {
        $request->validate([
            "password" => ['required', 'confirmed'],
            "password_confirmation" => ['required']
            ]);
            // dd($request->all());
        $pjr->update([
            "password" => bcrypt($request->password)
        ]);
        Alert::success('Berhasil', 'Password Berhasil Diganti');
        return redirect()->route('suAdmin.pengajar.get');
    }

    public function kelasGet() {
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        $classes = kelas::orderBy('id', 'DESC')->paginate(10);
        // dd($classes);
        return view('suAdmin.kelas',compact('teachs','classes'));
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
        session()->flash('data', $class['pengajar_id']);
        event(new hapusKelas($pengajar) );
        $class->delete();
        Alert::success('Berhasil', 'Kelas Berhasil Dihapus');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function kelasEdit(kelas $class) {
        $teachs = pengajar::where('status', 'non-aktiv')->get()->all();
        // dd($teachs);
        return view('suAdmin.kelas_edit',compact('class', 'teachs'));
    }

    public function kelasUpdate(kelasRequest $request, kelas $class) {
        $pengajar = new pengajar();
        session()->flash('data', $class['pengajar_id']);
        event(new hapusKelas($pengajar) );
        $pengajar2 = pengajar::where('id', $request->pengajar_baru)->get()->all();
        // dd($pengajar2);
        $class->update([
            "nama_kelas" => $request->kelas,
            "pengajar_id" => $request->pengajar_baru
        ]);
        $pengajar2[0]->update([
            "status" => "aktiv"
        ]);
        Alert::success('Berhasil', 'Data Kelas '.$request->kelas.' Berhasil Diupdate');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function tambahMurid() {
        dd('bisa');
    }

    public function pendingGet() {
        $pendings = r_pending::orderBy('id','DESC')->get()->all();
        return view('suAdmin.pending',compact('pendings'));
    }

    public function emailNotif(r_pending $pending) {
        Mail::to($pending['email'])->send(new ConfirmationEmail());
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
        $pending->delete();
        Alert::success('Berhasil', 'Email Telah Dikirimkan');
        return back();
    }

    public function muridGet() {
        $murids = User::where("role", 'murid')->paginate(10);
        return view('suAdmin.murid',compact('murids'));
    }

    public function muridDestroy(User $murid) {
        $murids = murid::where('nama', $murid['nama'])->get()->all();
        $murids[0]->delete();
        $murid->delete();
        Alert::success('Berhasil', 'Murid Berhasil Dihapus');
        return redirect()->route('suAdmin.murid.get');
    }
}
