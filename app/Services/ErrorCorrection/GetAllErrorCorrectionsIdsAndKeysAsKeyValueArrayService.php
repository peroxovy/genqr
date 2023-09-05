<?php

namespace App\Services\ErrorCorrection;
use App\Models\ErrorCorrection;

class GetAllErrorCorrectionsIdsAndKeysAsKeyValueArrayService
{
    public function execute()
    {
        $error_corrections = ErrorCorrection::select('id', 'error_correction_key')->pluck('id', 'error_correction_key')->toArray();

        return $error_corrections;
    }
}
