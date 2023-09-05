<?php

namespace App\Services\QrCode\User;
use App\Models\QrCode;

class GetSearchedByNameUserQrCodesService
{
    public function execute(int $userId, string $searchPhrase)
    {
        $qrcodes = QrCode::with('qr_code_details')->where('user_id', $userId)->where('qr_code_name', 'like', '%'.$searchPhrase.'%')->paginate(5);

        return $qrcodes;
    }
}
