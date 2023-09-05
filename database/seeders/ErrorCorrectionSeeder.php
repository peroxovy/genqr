<?php

namespace Database\Seeders;

use App\Models\ErrorCorrection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ErrorCorrectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $error_corrections = [
            'Low [7%]' => 'L',
            'Medium [15%]' => 'M',
            'Quartile [25%]' => 'Q',
            'High [30%]' => 'H',
        ];

        foreach($error_corrections as $error_correction_name => $error_correction_key)
        {
            ErrorCorrection::create([
                'error_correction_name' => $error_correction_name,
                'error_correction_key' => $error_correction_key
            ]);
        }
    }
}
