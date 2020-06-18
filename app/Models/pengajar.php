<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengajar extends Model
{
    protected $table = 'pengajars';
    protected $fillable = ['nama', 'status'];
    protected $guard = [];

}
