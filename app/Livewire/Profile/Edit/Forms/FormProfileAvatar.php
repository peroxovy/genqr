<?php

namespace App\Livewire\Profile\Edit\Forms;

use App\Livewire\Profile\Edit\Profile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProfileAvatar extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;

    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-avatar', ['user' => $this->user]);
    }

    public function rules()
    {
        return [
            'avatar' => ['image', 'max:1024'],
        ];
    }

    public function uploadAvatar()
    {
        $this->validate();

        $avatar_path = $this->user->username;

        Storage::disk('public')->putFileAs($avatar_path, $this->avatar, 'avatar.png');

        $this->user->user_details->avatar_path = $this->user->username.'/avatar.png';
        $this->user->user_details->save();

        session()->flash('success', 'Succesfully uploaded new avatar!');

        $this->redirect(Profile::class);
    }
}
