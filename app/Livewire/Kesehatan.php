<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KesehatanData;
use Illuminate\Http\Request;


class Kesehatan extends Component
{
    public $nama;
    public $prodi;
    public $rumah_sakit;
    public $tb;
    public $bb;
    public $tensi;
    public $keluhan;
    public $observasi_dokter;

    public function render()
    {
        $data = KesehatanData::orderBy('id', 'desc')->get();
        return view('livewire.kesehatan', ['data' => $data]);
    }

     public function tambah_data_kesehatan(){
        $table = new KesehatanData;
        $table->nama = $this->nama;
        $table->prodi = $this->prodi;
        $table->rumah_sakit = $this->rumah_sakit;
        $table->tb = $this->tb;
        $table->bb = $this->bb;
        $table->tensi = $this->tensi;
        $table->keluhan = $this->keluhan;
        $table->observasi_dokter = $this->observasi_dokter;
        $table->save();
        $this->reset(['nama', 'prodi', 'rumah_sakit', 'tb', 'bb', 'tensi', 'keluhan', 'observasi_dokter']);
    }

    public function hapus_k($id){
        $table = KesehatanData::find($id);
        $table->delete();
    }

    public function pass_check(Request $request){
            $passwordBenar = "ks-123";

            return response()->json([
                'valid' => $request->password === $passwordBenar
            ]);
    }

}
