<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PiketData extends Model
{
    protected $table = "tugas_pikets";
    protected $fillable = ['nama_tugas'];
}
