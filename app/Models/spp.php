<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    protected $fillable = ['nama', 'tahun', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
    protected $guarded = [];
}
