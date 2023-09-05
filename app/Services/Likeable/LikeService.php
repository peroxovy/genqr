<?php

namespace App\Services\Likeable;
use App\Models\QrCode;
use App\Models\User;

class LikeService
{
    public function handleLike(User $user, QrCode $qrcode)
    {
        if(!$this->isLiked($user, $qrcode))
        {
            $this->giveLike($user, $qrcode);
        } else {
            $this->revokeLike($user, $qrcode);
        }
    }

    public function isLiked(User $user, QrCode $qrcode)
    {
        if(!$user->likedQRCodes->contains($qrcode->id))
        {
            return false;
        } else {
            return true;
        }
    }

    public function giveLike(User $user, QrCode $qrcode)
    {
        $user->likedQRCodes()->attach($qrcode->id);
        $qrcode->qr_code_details->increment('likes');
    }

    public function revokeLike(User $user, QrCode $qrcode)
    {
        $user->likedQRCodes()->detach($qrcode->id);
        $qrcode->qr_code_details->decrement('likes');
    }
}
