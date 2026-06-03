<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Makan_Data;
use Illuminate\Http\Request;

class Makan extends Component
{
    public $nama;
    public $prodi;

    public function render()
    {
        $data = Makan_Data::orderBy('id', 'desc')->get();
        return view('livewire.makan', ['data' => $data]);
    }

     public function tambah_data_makan(){
        $table = new Makan_Data;
        $table->nama = $this->nama;
        $table->prodi = $this->prodi;
        $table->save();
        $this->reset(['nama', 'prodi']);
    }

    public function hapus_m($id){
        $table = Makan_Data::find($id);
        $table->delete();
    }

    public function pass_check(Request $request){
            $passwordBenar = "mkn-123";

            return response()->json([
                'valid' => $request->password === $passwordBenar
            ]);
    }


}
