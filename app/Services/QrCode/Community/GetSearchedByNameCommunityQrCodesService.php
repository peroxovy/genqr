<?php

namespace App\Services\QrCode\Community;
use App\Models\QrCode;

class GetSearchedByNameCommunityQrCodesService
{
    public function execute(int $userId, string $searchPhrase)
    {
        $qrcodes = QrCode::with(['qr_code_details', 'user'])
                        ->where('is_public', 1)
                        ->where('user_id', '!=', $userId)
                        ->where('qr_code_name', 'like', '%'.$searchPhrase.'%')
                        ->paginate(5);

        return $qrcodes;
    }
}
