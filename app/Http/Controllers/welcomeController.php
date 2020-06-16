<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Models\kelas;
use App\Models\murid;
use App\Models\pengajar;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index() {
        $info = information::where('tujuan',3)->paginate(5);
        $pembimbing = pengajar::get()->all();
        $murid = murid::get()->all();
        $class = kelas::get()->all();
        return view('welcome',compact('info','pembimbing','murid','class'));
    }
}
