<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPolling extends Model
{
    //
    public $timestamps = false;

    public function Pengguna(){
        return $this->belongsTo('\App\Models\Pengguna', 'id_pengguna_polling');   
    }
}
