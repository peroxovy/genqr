<?php

namespace App\Livewire\Profile\Show\Components;

use App\Models\User;
use Livewire\Component;

class ComponentShowUserProfileGeneralInformation extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->fill($user);
    }

    public function render()
    {
        return view('livewire.profile.show.components.component-show-user-profile-general-information');
    }

}
