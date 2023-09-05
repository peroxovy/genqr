<?php

namespace App\Services\QrCodeType;
use App\Models\QrCodeType;

class GetAllQrCodeTypesAsKeyValueArrayService
{
    public function execute()
    {
        $qr_code_types = QrCodeType::select('type_name', 'type_key')->pluck('type_name', 'type_key')->toArray();

        return $qr_code_types;
    }
}
