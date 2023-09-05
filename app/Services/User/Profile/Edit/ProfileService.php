<?php

namespace App\Services\User\Profile\Edit;
use App\Models\User;

class ProfileService
{
    public function execute(int $userId)
    {
        $userWithDetails = User::with('user_details')->findOrFail($userId);

        return $userWithDetails;
    }
}
