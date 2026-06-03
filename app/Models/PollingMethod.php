<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollingMethod extends Model
{
    public $timestamps = false;

    public function TipePolling(){
        return $this->belongsTo('\App\Models\TipePolling', 'id_tipe_polling');
    }
}
