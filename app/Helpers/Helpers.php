<?php

namespace App\Helpers;

class Helpers
{
    public static function deleteNullValuesFromArray(array $data) : array
    {
        return array_filter($data);
    }
}
