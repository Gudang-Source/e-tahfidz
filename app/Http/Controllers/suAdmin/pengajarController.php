<?php

namespace App\Http\Controllers\suAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\authRequest;
use App\Models\pengajar;
use App\Events\t_pengajarEvent;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\pengajarRequest;
use App\Http\Requests\editPengajarRequest;

class pengajarController extends Controller
{
    public function r_Data($r) {
        session()->flash('nama', $r->nama);
        session()->flash('email', $r->email);
        session()->flash('password',$r->password);
    }
    
    public function pengajarGet() {
        $pengajar = User::orderBy('id','DESC')->where('role', 'pengajar')->paginate(10);
        return view('suAdmin.pengajar.pengajar',compact('pengajar'));
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
}
