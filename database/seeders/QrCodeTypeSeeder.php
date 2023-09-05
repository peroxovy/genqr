<?php

namespace Database\Seeders;

use App\Models\QrCodeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QrCodeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qr_types = [
            'Sample text' => 'text',
            'URL link' => 'url',
            'E-mail address' => 'email',
            'Phone number' => 'phone',
            'GPS localization' => 'gps',
            'WiFi data' => 'wifi',
        ];

        foreach($qr_types as $type_name => $type_key)
        {
            QrCodeType::create([
                'type_name' => $type_name,
                'type_key' => $type_key
            ]);
        }
    }
}
