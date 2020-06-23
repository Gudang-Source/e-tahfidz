<?php

namespace App\Http\Controllers;

use App\Models\feature;
use App\Models\iklan;
use App\Models\information;
use App\Models\kelas;
use App\Models\murid;
use App\Models\pengajar;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index() {
        $info = information::where('tujuan',1)->limit(5)->latest()->get();
        $pembimbing = pengajar::get()->all();
        $murid = murid::get()->all();
        $class = kelas::get()->all();
        $iklan = iklan::where('status', 'checked')->latest()->limit(3)->get()->all();
        $fiturIklan = feature::where('nama_fitur','iklan')->get()->all();
        // dd($iklan);
        return view('welcome',compact('info','pembimbing','murid','class','iklan','fiturIklan'));
    }
}
