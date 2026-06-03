<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\OpsiPolling;
use App\Models\PollingMethod;

class EditPolling extends Component
{
    public $table;

    public function mount($id){
        $this->table = OpsiPolling::where('id_pilih_polling', $id)->get();
    }

    public function render()
    {
        return view('livewire.edit-polling', ['data' => $this->table])->layout('components.layouts.navbar2')->slot('main');
    }

    public function update_pollings(Request $req, $id){
        $tbl = OpsiPolling::find($id);
        $tbl->opsi_polling = $req->opsi_polling;
        $tbl->update();
        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => $tbl
        ]);
    }

    public function update_status_dibuka_pollings($id){
        $table = PollingMethod::find($id);
        $table->status = "Dibuka";
        $table->update();
        return response()->json([
            'success' => true,
            'data' => $table
        ]);
    }

     public function update_status_ditutup_pollings($id){
        $table = PollingMethod::find($id);
        $table->status = "Ditutup";
        $table->update();
        return response()->json([
            'success' => true,
            'data' => $table
        ]);
    }
}
