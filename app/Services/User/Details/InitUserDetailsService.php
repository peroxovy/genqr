<?php

namespace App\Services\User\Details;
use App\Models\User;

class InitUserDetailsService
{
    public function initDetails(User $user)
    {
        $userDetails = $user->user_details()->create([
            'user_id' => $user->id,
            'avatar_path' => null,
            'firstname' => null,
            'lastname' => null,
            'about' => null,
            'country' => null,
            'city' => null,
            'url_linkedin' => null,
            'url_youtube' => null,
            'url_instagram' => null,
            'url_github' => null,
            'url_twitter' => null,
            'profile_views' => 0,
            'generated_qr_codes' => 0,
            'time_spent' => 0,
        ]);

        return $userDetails;
    }
}
