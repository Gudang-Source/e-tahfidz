<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class information extends Model
{
    protected $fillable = ['judul', 'info', 'tujuan', 'tanggal', 'informan'];

    public function user() {
        return $this->belongsTo(User::class,'informan');
    }

    public function visible() {
        return $this->belongsTo(visible::class,'tujuan');
    }
}
