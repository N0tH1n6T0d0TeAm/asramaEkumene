<?php

namespace App\Livewire;

use Livewire\Component;

class EScan extends Component
{
    public function render()
    {
        return view('livewire.e-scan')->layout('components.layouts.navbar2')->slot('main');
    }
}
