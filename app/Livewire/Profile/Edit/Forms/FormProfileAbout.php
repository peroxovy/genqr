<?php

namespace App\Livewire\Profile\Edit\Forms;

use App\Livewire\Profile\Edit\Profile;
use App\Models\User;
use Livewire\Component;

class FormProfileAbout extends Component
{
    public User $user;

    public ?string $about = '';

    public function mount(User $user)
    {
        $this->about = $user->user_details->about;
    }
    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-about');
    }

    public function rules()
    {
        return [
            'about' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function updateAbout()
    {
        $this->validate();

        $this->user->user_details->update([
            'about' => $this->about,
        ]);

        session()->flash('success', 'Bio successfuly updated!');

        $this->redirect(Profile::class);
    }
}
