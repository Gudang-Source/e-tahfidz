<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $fillable = ['penerima_id', 'pengirim_id', 'note'];
    protected $guarded = [];
}
