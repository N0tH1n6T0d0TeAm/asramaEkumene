<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transportasi_Data;

class CekTransportasi extends Component
{
    public function render()
    {
        $table = new Transportasi_Data;
        $table->nama = auth()->user()->nama . " (" . auth()->user()->nim . ")";
        $table->prodi = auth()->user()->prodi . "/" . auth()->user()->angkatan;
        $table->save();
        return view('livewire.cek-transportasi')->layout('components.layouts.navbar2')->slot('main');
    }
}
