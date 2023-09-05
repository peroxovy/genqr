<?php

namespace App\Services\QrCode\Community;
use App\Models\QrCode;

class GetAllCommunityQrCodesService
{
    public function execute(int $userId)
    {
        $qrcodes = QrCode::with(['qr_code_details', 'user'])
                        ->where('is_public', 1)
                        ->where('user_id', '!=', $userId)
                        ->paginate(5);

        return $qrcodes;
    }
}
