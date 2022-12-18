<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function siswas()
    {
        return $this->belongsToMany('App\Models\Siswa') -> withTimestamps();
    }
}
