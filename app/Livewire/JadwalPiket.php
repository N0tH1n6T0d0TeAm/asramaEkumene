<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PiketData;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class JadwalPiket extends Component
{
    public function render()
    {
        $data = PiketData::all();
        $data2 = Pengguna::all();
        return view('livewire.jadwal-piket', ['data' => $data, 'data2' => $data2]);
    }

    public function update_status(Request $req, $id){
    // Cari pengguna berdasarkan nama
    $pengguna = Pengguna::find($id);

    if (!$pengguna) {
        return response()->json(['posisi' => 'error', 'message' => 'Tidak ditemukan'], 404);
    }

    $pengguna->posisi = $req->posisi;
    $pengguna->save();

    return response()->json(['status' => 'success', 'message' => 'Berhasil diperbarui']);
    }

    public function tambah(Request $req)
    {
        $table = new PiketData;
        $table->nama_tugas = $req->nama_tugas;
        $table->save();

        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil ditambahkan',
            'data' => $table
        ]);
    }

    // Edit Tugas
  // Controller
public function edit(Request $request, $id) // Tambahkan parameter $id
{
    $request->validate([
        'nama_tugas_baru' => 'required'
    ]);
    
    // Gunakan $id dari URL alih-alih $request->tugas_id
    $tugas = PiketData::find($id);
    $tugas->nama_tugas = $request->nama_tugas_baru;
    $tugas->save();
    
    return response()->json(['success' => true]);
}

    // Hapus Tugas
    public function hapus($id)
    {
        $table = PiketData::findOrFail($id);
        $table->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil dihapus'
        ]);
    }

    // Ambil Semua Tugas (Untuk Load Data Awal)
    public function index()
    {
        $data = PiketData::all();
        return response()->json(['data' => $data]);
    }
    
}
