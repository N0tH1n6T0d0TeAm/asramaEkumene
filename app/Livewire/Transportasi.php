<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transportasi_Data;
use App\Models\Pic_password;
use Illuminate\Http\Request;

class Transportasi extends Component
{
    public $nama;
    public $prodi;

    public function render()
    {
        $data = Transportasi_Data::orderBy('id', 'desc')->get();
        return view('livewire.transportasi', ['data' => $data]);
    }

    public function tambah_data_tansportasi(){
        $table = new Transportasi_Data;
        $table->nama = $this->nama;
        $table->prodi = $this->prodi;
        $table->save();
        $this->reset(['nama', 'prodi']);
    }

    public function hapus_t($id){
        $table = Transportasi_Data::find($id);
        $table->delete();
    }

    public function pass_check(Request $request){
            $passwordBenar = "tp-123";

            return response()->json([
                'valid' => $request->password === $passwordBenar
            ]);
    }
}
