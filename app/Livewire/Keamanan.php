<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KeamananData;
use App\Models\IbadahKatalog;
use Illuminate\Http\Request;

class Keamanan extends Component
{

    public $nama;
    public $prodi;
    public $ibadah; 

    public function render()
    {
        $data = KeamananData::orderBy('id', 'desc')->get();
        return view('livewire.keamanan', ['data' => $data]);
    }

     public function tambah_data_keamanan(){
        $table = new KeamananData;
        $table->nama = $this->nama;
        $table->prodi = $this->prodi;
        $table->ibadah = $this->ibadah;
        $table->save();
        $this->reset(['nama', 'prodi', 'ibadah']);
    }

    public function tambah_data_ibadah(Request $req){
        $table = new IbadahKatalog;
        dd($req->pmt);
    }

    public function hapus_km($id){
        $table = KeamananData::find($id);
        $table->delete();
    }

    public function pass_check(Request $request){
            $passwordBenar = "km-123";

            return response()->json([
                'valid' => $request->password === $passwordBenar
            ]);
    }
}
