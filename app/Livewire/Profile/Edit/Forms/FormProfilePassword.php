<?php

namespace App\Livewire\Profile\Edit\Forms;

use App\Livewire\Profile\Edit\Profile;
use App\Models\User;
use App\Rules\MatchUserPassword;
use Livewire\Component;

class FormProfilePassword extends Component
{
    public User $user;
    public string $password = '';
    public string $new_password = '';
    public string $new_password_confirmation = '';

    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-password');
    }

    public function rules()
    {
        return [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', new MatchUserPassword],
        ];
    }

    public function updatePassword()
    {
        $this->validate();

        $this->user->password = bcrypt($this->new_password);
        $this->user->save();

        session()->flash('success', 'Password has been updated!');

        $this->redirect(Profile::class);
    }
}
