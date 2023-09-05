<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QrCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_public' => 'boolean'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function qr_code_type() : BelongsTo
    {
        return $this->belongsTo(QrCodeType::class);
    }

    public function error_correction() : BelongsTo
    {
        return $this->belongsTo(ErrorCorrection::class);
    }

    public function qr_code_details() : HasOne
    {
        return $this->hasOne(QrCodeDetails::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_qr_code_likes');
    }
}
