<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    protected $fillable = ['nama_fitur', 'status'];
    protected $guarded = [];
}
