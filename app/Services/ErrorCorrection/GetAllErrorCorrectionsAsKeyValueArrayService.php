<?php

namespace App\Services\ErrorCorrection;
use App\Models\ErrorCorrection;

class GetAllErrorCorrectionsAsKeyValueArrayService
{
    public function execute()
    {
        $error_corrections = ErrorCorrection::select('error_correction_name', 'error_correction_key')->pluck('error_correction_name', 'error_correction_key')->toArray();

        return $error_corrections;
    }
}
