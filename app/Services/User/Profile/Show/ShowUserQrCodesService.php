<?php

namespace App\Services\User\Profile\Show;
use App\Models\QrCode;
use App\Models\User;

class ShowUserQrCodesService
{
    public function execute(int $userId)
    {
        $qrcodes = QrCode::with(['qr_code_details'])->where('is_public', 1)->where('user_id', $userId)->paginate(5);

        return $qrcodes;
    }
}
