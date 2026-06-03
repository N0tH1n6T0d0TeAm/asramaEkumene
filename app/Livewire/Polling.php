<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserPolling;
use App\Models\TipePolling;
use App\Models\OpsiPolling;
use App\Models\PollingMethod;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Polling extends Component
{
    public function render()
    {
        $table = TipePolling::orderBy('id', 'desc')->get();
        
         $table2 = PollingMethod::orderBy('id', 'desc')->get();

         $table3 = OpsiPolling::all();

         $table4 = UserPolling::all();
         
        return view('livewire.polling', ['data' => $table, 'data2' => $table2, 'data3' => $table3, 'data4' => $table4])->layout('components.layouts.navbar2')->slot('main');
    }

    
    public function tambah_tipe_polling(Request $req){
        $table = new TipePolling;
        $table->tipe_polling = $req->tipe_polling;
        $table->save();

        return response()->json([
        'success' => true,
        'message' => 'Tipe berhasil ditambahkan',
        'data' => $table
    ]);
    }

    public function update_tipe_polling(Request $req, $id){
        $table = TipePolling::find($id);
        $table->tipe_polling = $req->tipe_p;
        $table->update();

        return response()->json([
            'success' => true,
            'message' => 'Tipe Berhasil Diubah',
            'data' => $table
        ]);
    }

    public function hapus_polling($id){
        $table = TipePolling::find($id);
        $table2 = PollingMethod::where('id_tipe_polling', $id);
        $table->delete();
        $table2->delete();
        return response()->json([
            'Sukses' => true,
            'message' => 'Data Dihapus',
            'data' => $table
        ]);
    }

    public function tambah_detail_polling(Request $req){
        $table = new PollingMethod;
        $table->id_tipe_polling = $req->id_tipe_polling;
        $table->tanggal = Carbon::now()->format('Y-m-d');
        $table->status = "Dibuka";
        $table->save();
        

        $input_opsi = $req->opsi_polling;
        foreach($input_opsi as $i => $value){
            $table2 = new OpsiPolling;
            $table2->opsi_polling = $req->opsi_polling[$i];
            $table2->id_pilih_polling = $table->id;
            $table2->save();
        }

        return response()->json([
            'success' => true,
            'message'=> 'Data ditambah',
            'data' =>  $table
        ]);
    }

    public function user_polling(Request $req){
        $tbl = new UserPolling;
        $tbl->id_pengguna_polling = auth()->user()->id;
        $tbl->id_opsi_polling = $req->id_opsi_polling;
        $tbl->save();

        return back();
    }

    public function hapus_user_polling($id){
        $hps = UserPolling::find($id);
        $hps->delete();
        return back();
    }

    
    public function tampilkan_detail_polling($id){
        $table = OpsiPolling::where('id_pilih_polling', $id)->get();

         return response()->json([
            'success' => 'Berhasil!',
            'data' => $table,
        ]);
    }

     public function hapus_polling_semua($id){
        $table = PollingMethod::find($id);
         $table->delete();
        $table2 = OpsiPolling::where('id_pilih_polling', $id)->first();
        $table2->delete();
    }

}
