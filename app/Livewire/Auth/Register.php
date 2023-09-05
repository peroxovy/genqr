<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Services\User\Details\InitUserDetailsService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $username, $email, $password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function resetInputFields()
    {
        $this->reset('email');
        $this->reset('password');
    }

    public function register()
    {
        $validated = $this->validate([
            'username' => 'required|string|min:3|max:30',
            'email' => 'required|email|min:5|max:50|unique:users,email',
            'password' => 'required|min:3',
        ]);

        try {
            $user = User::create([
                        'username' => $validated['username'],
                        'email' => $validated['email'],
                        'password' => bcrypt($validated['password']),
                    ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $userDetails = app(InitUserDetailsService::class)->initDetails($user);

        if($user)
        {
            Auth::login($user);
            session()->flash('success', "Account created successfuly.");
            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', "You successfuly Logged in.");
        }
    }
}
