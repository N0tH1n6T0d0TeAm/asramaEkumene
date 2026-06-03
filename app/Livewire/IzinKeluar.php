<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\IzinKeluarz;

class IzinKeluar extends Component
{
    use WithFileUploads;

    public $foto;
    
    public function render()
    {
        $data = IzinKeluarz::all();
        return view('livewire.izin-keluar', ['data' => $data])->layout('components.layouts.navbar2')->slot('main');
    }

    public function tambah_izin(){
        $table = new IzinKeluarz;
        $table->id_user = auth()->user()->id;
        if($this->foto){
            $path = $this->foto->store('izin_keluar', 'public');
            $table->foto_belum_berangkat = $path;
        }
        $table->save();
    }
}
