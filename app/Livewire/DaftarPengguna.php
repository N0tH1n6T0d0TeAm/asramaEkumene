<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengguna;

class DaftarPengguna extends Component
{
    public function render()
    {
        $data = Pengguna::all();
        return view('livewire.daftar-pengguna', ['data' => $data])->layout('components.layouts.navbar2')->slot('main');
    }

    public function show_gambar($id){
        $table = Pengguna::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Gambar Profil Sukses Ditampilkan!',
            'data' => $table,
        ]);
    }

    public function hapus_pengguna($id){
        $tbl = Pengguna::find($id);
        $tbl->delete();
        return back();
    }
}
