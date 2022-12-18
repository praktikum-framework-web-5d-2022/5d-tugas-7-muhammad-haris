<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dokters()
    {
        return $this->belongsToMany('App\Models\Dokter') -> withTimestamps();
    }
}
