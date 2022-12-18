<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pasiens()
    {
        return $this->belongsToMany('App\Models\Pasien') -> withTimestamps();
    }
}
