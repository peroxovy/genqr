<?php

namespace App\Services\QrCode\User;
use App\Models\QrCode;

class GetAllUserQrCodesService
{
    public function execute(int $userId)
    {
        $qrcodes = QrCode::with('qr_code_details')->where('user_id', $userId)->paginate(5);

        return $qrcodes;
    }
}
