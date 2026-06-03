<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PollingMethod;
use App\Models\UserPolling;
use App\Models\OpsiPolling;

class DetailPolling extends Component
{
    public $data;
    public $data2;
    public $data3;

    public function mount($id)
    {
        $this->data = PollingMethod::all();
        $this->data2 = OpsiPolling::where('id_pilih_polling', $id)->get();
        $this->data3 = UserPolling::all();
    }

    public function render()
    {
        return view('livewire.detail-polling', [
            'data' => $this->data,
            'data2' => $this->data2,
            'data3' => $this->data3
        ]);
    }

}
