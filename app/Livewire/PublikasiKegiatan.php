<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KegiatanMethod;
use App\Models\FotoKegiatan;
use Illuminate\Support\Facades\Auth;

class PublikasiKegiatan extends Component
{
    use WithFileUploads;

    public $foto = [];
    public $asrama = 'Semua';
    public $deskripsi;

    public $table;
    public $table2;

   

    public function mount(){
        $this->asrama = Auth::user()->asrama;
    }

    public function render()
    {
         $table = FotoKegiatan::all();
        $table2 = KegiatanMethod::orderBy('id', 'desc')->get();
        return view('livewire.publikasi-kegiatan', ['data' => $table, 'data2' => $table2])->layout('components.layouts.navbar2')->slot('main');
    }

    public function tambah_kegiatan(){

        $table = new KegiatanMethod;
        $table->deskripsi = $this->deskripsi;
        $table->posisi_asrama = $this->asrama;
        $table->save();

        foreach($this->foto as $t){
            $table2 = new FotoKegiatan;
            $p = $t->store('kegiatan', 'public');
            $table2->foto_kegiatan = $p;
            $table2->id_kegiatan = $table->id;
            $table2->save();
        }

        $this->reset();
        
    }
}
