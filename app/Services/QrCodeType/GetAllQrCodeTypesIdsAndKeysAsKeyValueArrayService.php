<?php

namespace App\Services\QrCodeType;
use App\Models\QrCodeType;

class GetAllQrCodeTypesIdsAndKeysAsKeyValueArrayService
{
    public function execute()
    {
        $qr_code_types = QrCodeType::select('id', 'type_key')->pluck('id', 'type_key')->toArray();

        return $qr_code_types;
    }
}
