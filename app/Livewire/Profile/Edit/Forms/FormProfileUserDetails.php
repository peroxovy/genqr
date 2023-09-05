<?php

namespace App\Livewire\Profile\Edit\Forms;

use App\Livewire\Profile\Edit\Profile;
use App\Models\User;
use Livewire\Component;

class FormProfileUserDetails extends Component
{
    public User $user;
    public ?string $firstname = '';
    public ?string $lastname = '';
    public ?string $country = '';
    public ?string $city = '';

    public function mount(User $user)
    {
        $this->firstname = $user->user_details->firstname;
        $this->lastname = $user->user_details->lastname;
        $this->country = $user->user_details->country;
        $this->city = $user->user_details->city;
    }

    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-user-details');
    }

    public function rules()
    {
        return [
            'firstname' => ['nullable', 'string', 'min:2', 'max:30'],
            'lastname' => ['nullable', 'string', 'min:2', 'max:30'],
            'city' => ['nullable', 'string', 'max:30'],
            'country' => ['nullable', 'string', 'max:30'],
        ];
    }

    public function updateUserDetails()
    {
        $this->validate();

        $this->user->user_details->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'city' => $this->city,
            'country' => $this->country,
        ]);

        session()->flash('success', 'User details has been updated!');

        $this->redirect(Profile::class);
    }
}
