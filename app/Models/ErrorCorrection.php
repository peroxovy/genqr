<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ErrorCorrection extends Model
{
    use HasFactory;

    public function qr_codes() : HasMany
    {
        return $this->hasMany(QrCode::class);
    }
}
