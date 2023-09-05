<?php

namespace App\Livewire\Profile\Edit\Components;

use App\Models\User;
use Livewire\Component;

class ProfileStats extends Component
{
    public User $user;

    public int $profile_views = 0;
    public int $generated_qr_codes = 0;
    public int $time_spent = 0;
    public int $liked_qr_codes = 0;

    public function mount(User $user)
    {
        $this->profile_views = $this->user->user_details->profile_views;
        $this->generated_qr_codes = $this->user->user_details->generated_qr_codes;
        $this->time_spent = $this->user->user_details->time_spent;
        $this->liked_qr_codes = $this->user->likedQRCodes->count();
    }

    public function render()
    {
        return view('livewire.profile.edit.components.profile-stats');
    }
}
