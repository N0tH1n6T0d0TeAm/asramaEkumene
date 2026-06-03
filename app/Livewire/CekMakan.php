<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Makan_Data;

class CekMakan extends Component
{
    public function render()
    {
         $table = new Makan_Data;
        $table->nama = auth()->user()->nama . " (" . auth()->user()->nim . ")";
        $table->prodi = auth()->user()->prodi . "/" . auth()->user()->angkatan;
        $table->save();
        return view('livewire.cek-makan')->layout('components.layouts.navbar2')->slot('main');
    }
}
