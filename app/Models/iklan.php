<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class iklan extends Model
{
    protected $fillable = ['gambar', 'status'];
    protected $guarded = [];
}
