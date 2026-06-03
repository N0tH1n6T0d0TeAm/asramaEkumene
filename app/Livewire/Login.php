<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $nim_mahasiswa;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login(){
       if (Auth::attempt(['nim' => $this->nim_mahasiswa, 'password' => $this->password], true)) {
        return redirect('dorm/dashboard');
    }
        session()->flash('error','Akun dan Password Anda Salah!');
    }
}
