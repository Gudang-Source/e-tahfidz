<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['nama_kelas', 'pengajar_id','angkatan'];
    protected $guarded = [];

    public function pengajar() {
        return $this->belongsTo(pengajar::class,'pengajar_id');
    }
}
