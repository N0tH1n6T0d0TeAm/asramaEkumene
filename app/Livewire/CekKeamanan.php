<?php

namespace App\Livewire;

use Livewire\Component;

class CekKeamanan extends Component
{
    public function render()
    {
        return view('livewire.cek-keamanan')->layout('components.layouts.navbar2')->slot('main');
    }
}
