<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ekskuls()
    {
        return $this->belongsToMany('App\Models\Ekskul') -> withTimestamps();
    }
}
