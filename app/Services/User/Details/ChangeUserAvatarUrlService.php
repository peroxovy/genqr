<?php

namespace App\Services\User\Details;
use App\Models\User;

class ChangeUserAvatarUrlService
{
    public function execute(User $user, string $userNewUsername) : void
    {
        $user->user_details->update([
            'avatar_path' => $userNewUsername . '/avatar.png'
        ]);
    }
}
