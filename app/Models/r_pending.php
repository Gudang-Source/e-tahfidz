<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class r_pending extends Model
{
    protected $table = 'r_pendings';
    protected $fillable = ['nama', 'email', 'password', 'no_telp', 'alamat'];
    protected $guarded = [];
}
