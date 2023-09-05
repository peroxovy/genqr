<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function resetInputFields()
    {
        $this->reset('email');
        $this->reset('password');
    }

    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(array('email' => $validated['email'], 'password' => $validated['password']))){

            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', "You successfuly Logged in.");
        }else{
            session()->flash('error', 'Invalid e-mail or password.');
        }
    }
}
