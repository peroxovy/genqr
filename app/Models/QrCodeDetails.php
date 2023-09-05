<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QrCodeDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qr_code() : BelongsTo
    {
        return $this->belongsTo(QrCode::class);
    }
}
