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
use RealRashid\SweetAlert\Facades\Alert;

class suAdminController extends Controller
{
    public function indexData() {
       return [
        "visibles" => $visibles = visible::get()->all(),
        "pengajar" => $pengajar = pengajar::get()->all(),
        "murid" => $murid = murid::get()->all(),
        "class" => $class = kelas::get()->all(),
        "info" => $info = information::orderBy('id','DESC')->paginate(5),
       ];
    }

    public function index() {
        $data = $this->indexData();
        return view('suAdmin.index', [
            "visibles" => $data['visibles'],
            "pengajar" => $data['pengajar'],
            "murid" => $data['murid'],
            "class" => $data['class'],
            "info" => $data['info']
        ]);
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
        return view('suAdmin.pengajar.pengajar',compact('pengajar'));
    }
    public function r_Data($r) {
        session()->flash('nama', $r->nama);
        session()->flash('email', $r->email);
        session()->flash('password',$r->password);
    }
    public function pengajarPost(authRequest $request) {
        $this->r_Data($request);
        $user = new User();
        event(new t_pengajarEvent($user));
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
        return back();
    }

    public function pengajarEdit(User $pjr) {
        return view('suAdmin.pengajar.pengajar_edit',compact('pjr'));
    }

    public function pengajarUpdate(User $pjr, pengajarRequest $request) {
        $pjr->update([
            "nama" => $request->nama,
            "email" => $request->email,
        ]);
        Alert::success('Berhasil', 'Data Pengajar '.$pjr['nama'].' Berhasil Diupdate');
        return redirect()->route('suAdmin.pengajar.get');
    }
    public function editPassword(editPengajarRequest $request, User $pjr) {
        $pjr->update([
            "password" => bcrypt($request->password)
        ]);
        Alert::success('Berhasil', 'Password Berhasil Diganti');
        return back();
    }

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
       return redirect()->route('suAdmin.kelas.get');
        
    }

    public function dropMurid(murid $murid, kelas $class) {
        $murid->update([
            "kelas_id" => null
        ]);
        Alert::success('Berhasil', 'Murid Berhasil Dikeluarkan');
        return redirect()->route('suAdmin.kelas.get');
    }

    public function noteGet(murid $murid) {
        return view('suAdmin.note.note',compact('murid'));
    }

    public function notePost(Request $request, murid $murid) {
        dd($request->all());
    }

    public function pendingGet() {
        $pendings = r_pending::orderBy('id','DESC')->get()->all();
        return view('suAdmin.pending.pending',compact('pendings'));
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
        return view('suAdmin.murid.murid',compact('murids'));
    }

    public function muridDestroy(User $murid) {
        $murids = murid::where('nama', $murid['nama'])->get()->all();
        $murids[0]->delete();
        $murid->delete();
        Alert::success('Berhasil', 'Murid Berhasil Dihapus');
        return redirect()->route('suAdmin.murid.get');
    }
}
