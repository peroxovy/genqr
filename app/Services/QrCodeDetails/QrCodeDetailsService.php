<?php

namespace App\Services\QrCodeDetails;
use App\Models\QrCode;
use Carbon\Carbon;

class QrCodeDetailsService
{
    public function initDetails(QrCode $qrcode)
    {
        $qrcodeDetails = $qrcode->qr_code_details()->create([
            'qr_code_id' => $qrcode->id,
            'views' => 0,
            'downloads' => 0,
            'likes' => 0,
            'shares' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $qrcodeDetails;
    }
}
