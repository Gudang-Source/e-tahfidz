<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['nama_kelas', 'pengajar_id','angkatan'];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return "nama_kelas";
    }

    public function students() {
        return $this->hasMany(murid::class,'pengajar_id');
    }

    public function pengajar() {
        return $this->belongsTo(pengajar::class, 'pengajar_id');
    }
}
