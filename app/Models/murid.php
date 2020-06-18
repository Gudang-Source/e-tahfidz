<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class murid extends Model
{
    protected $fillable = ['nama', 'kelas_id'];
    protected $guarded = [];

    public function class() {
        return $this->belongsTo(kelas::class,'kelas_id');
    }
}
