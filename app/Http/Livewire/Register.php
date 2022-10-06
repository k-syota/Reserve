<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $email;
    public $password;

    public $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users|max:255',
        'password' => 'required|string|min:8',
    ];

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function register()
    {
        $this->validate();
        User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password),
        ]);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
