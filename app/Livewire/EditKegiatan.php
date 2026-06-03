<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KegiatanMethod;
use App\Models\FotoKegiatan;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditKegiatan extends Component
{
    use WithFileUploads;

    public $table;
    public $table2;
    public $foto;

    public function mount($id){
        $this->table = KegiatanMethod::find($id);
        $this->table2 = FotoKegiatan::all();
    }

    public function render()
    {
        return view('livewire.edit-kegiatan', ['data' => $this->table, 'data2' => $this->table2])->layout('components.layouts.navbar2')->slot('main');
    }

    public function ubah_foto_k(Request $req, $id){
        $table2 = FotoKegiatan::find($id);
        if($req->hasFile('foto')){

             if ($table2->foto_kegiatan && Storage::disk('public')->exists($table2->foto_kegiatan)) {
                Storage::disk('public')->delete($table2->foto_kegiatan);
            }

            $path = $req->file('foto')->store('kegiatan', 'public');
            $table2->foto_kegiatan = $path;
            $table2->update();
        }
        return back();
    }

    public function update_publikasi_kegiatan(Request $req, $id){
        $table = KegiatanMethod::find($id);
        $table->created_at = $req->tanggal;
        $table->posisi_asrama = $req->asrama;
        $table->deskripsi = $req->deskripsi;
        $table->update();
    }

    public function hapus_kegiatan($id){
        $table = KegiatanMethod::find($id);
        $table2 = FotoKegiatan::where('id_kegiatan', $id);
        $table->delete();
        $table2->delete();
        
        return back();
    }
}
