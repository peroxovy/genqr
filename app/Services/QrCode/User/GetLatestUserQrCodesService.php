<?php

namespace App\Services\QrCode\User;
use App\Models\QrCode;

class GetLatestUserQrCodesService
{
    public function execute(int $userId)
    {
        $qrcodes = QrCode::with('qr_code_details')->where('user_id', $userId)->limit(3)->get();

        return $qrcodes;
    }
}
