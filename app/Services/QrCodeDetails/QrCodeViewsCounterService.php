<?php

namespace App\Services\QrCodeDetails;
use App\Models\QrCode;

class QrCodeViewsCounterService
{
    public function execute(QrCode $qrcode) : void
    {
        $qrcode->qr_code_details->increment('views');
    }
}
