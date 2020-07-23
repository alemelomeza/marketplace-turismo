<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
use Illuminate\Support\Facades\Hash;

class Registration extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public $statusSubmit = false;

    public function render()
    {
        return view('livewire.registration');
    }

    public function updated($field){
        $this->validateOnly($field,[
            'name' => 'min:6',
            'email' => 'email',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|min:6|max:32',
            'email' =>'required|string|email|min:6|max:32|unique:users,email',
            'password' =>'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user ? $this->statusSubmit = true : $this->statusSubmit = false;

    }
}
