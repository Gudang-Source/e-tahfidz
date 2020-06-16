<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visible extends Model
{
    protected $fillable = ['visible'];
    public function info() {
        return $this->hasMany(information::class,'tujuan');
    }
}
