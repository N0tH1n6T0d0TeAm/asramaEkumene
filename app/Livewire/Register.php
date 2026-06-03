<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    use WithFileUploads;
    
    public $foto;
    public $nama_lengkap;
    public $tahun = '';
    public $prodi_stt = '';
    public $posisi_asrama = '';
    public $status_user = '';
    public $nim_mahasiswa;
    public $password;

    public function render()
    {
        return view('livewire.register');
    }

    
    public function save(){
        $users = new Pengguna;
        if($this->foto){
            $path = $this->foto->store('profile', 'public');
            $users->foto_profil = $path;
        }else{
            $users->foto_profil = "NULL";
        }

        $users->nama = $this->nama_lengkap;
        $users->angkatan = $this->tahun;
        $users->asrama = $this->posisi_asrama;
        $users->prodi = $this->prodi_stt;
        $users->status = $this->status_user;
        $users->nim = $this->nim_mahasiswa;
        $users->password = bcrypt($this->password);
        $users->kamar = "Belum Ada Kamar";
        $users->save();

        Auth::login($users, true);
        return redirect('dorm/dashboard');
    }
}
