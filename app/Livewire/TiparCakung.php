<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengguna;
use App\Models\KegiatanMethod;
use App\Models\FotoKegiatan;

class TiparCakung extends Component
{
    public function render()
    {
        $data = Pengguna::all();
        $table = FotoKegiatan::all();
        $table2 = KegiatanMethod::orderBy('id', 'desc')->get();
        return view('livewire.tipar-cakung', ['data' => $data, 'data2' => $table, 'data3' => $table2])->layout('components.layouts.navbar')->slot('main');
    }
}
