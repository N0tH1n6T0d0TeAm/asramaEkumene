<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dorm extends Component
{
    public function render()
    {
        return view('livewire.dorm')->layout('components.layouts.navbar2')->slot('main');
    }

    public function logout(){
        Auth::logout();
        return redirect('dorm/login');
    }
}
