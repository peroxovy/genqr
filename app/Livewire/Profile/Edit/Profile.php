<?php

namespace App\Livewire\Profile\Edit;

use App\Models\User;
use App\Services\User\Profile\Edit\ProfileService;
use Livewire\Component;

class Profile extends Component
{
    public string $routeName = 'profile';
    public User $user;

    public function mount()
    {
        $this->user = app(ProfileService::class)->execute(auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.profile.edit.profile', ['user' => $this->user]);
    }
}
