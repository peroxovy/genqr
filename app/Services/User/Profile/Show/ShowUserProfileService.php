<?php

namespace App\Services\User\Profile\Show;
use App\Models\User;

class ShowUserProfileService
{
    public function execute(int $userId)
    {
        $user = User::with(['user_details'])->select('id', 'username', 'email')->where('id', $userId)->first();

        return $user;
    }
}
