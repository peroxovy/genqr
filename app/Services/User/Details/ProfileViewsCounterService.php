<?php

namespace App\Services\User\Details;
use App\Models\User;

class ProfileViewsCounterService
{
    public function execute(User $user)
    {
        $user->user_details->increment('profile_views');
    }
}
