<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengguna;
use Livewire\WithFileUploads;

class EditPengguna extends Component
{
    use WithFileUploads;

   
    public $tbl;
    public $foto;
    public $nama_lengkap;
    public $prodi_stt;
    public $status_user;
    public $password;
    public $id;
    public $posisi_asrama;
    public $kamar;
    public $angkatan;
    

    public function mount($id){
        $this->tbl = Pengguna::find($id);
        $hmm = Pengguna::find($id);
        $this->nama_lengkap = $hmm->nama;
        $this->prodi_stt = $hmm->prodi;
        $this->posisi_asrama = $hmm->asrama;
        $this->status_user = $hmm->status;
        $this->angkatan = $hmm->angkatan;
        $this->kamar = $hmm->kamar;
    }

    public function render()
    {
        return view('livewire.edit-pengguna', ['data' => $this->tbl])->layout('components.layouts.navbar2')->slot('main');
    }

    public function update(){
        $id = $this->id;
        $table = Pengguna::find($id);
         if ($this->foto) {
        $path = $this->foto->store('profile', 'public');
        $table->foto_profil = $path;
        }
        $table->nama = $this->nama_lengkap;
        
        if($this->angkatan){
            $table->angkatan = $this->angkatan;
        }
        $table->asrama = $this->posisi_asrama;
        $table->prodi = $this->prodi_stt;
        $table->status = $this->status_user;
        
        if($this->password){
            $table->password = bcrypt($this->password);
        }

        $table->kamar = $this->kamar;
        $table->update();

        $this->dispatch('sukses');
    }
}
