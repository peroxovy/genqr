<?php

namespace App\Livewire;

use App\Models\QrCode;
use App\Services\QrCodeDetails\QrCodeDownloadsCounterService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DownloadCode extends Component
{
    public QrCode $qrcode;
    public function render()
    {
        return view('livewire.download-code');
    }

    public function downloadQrCode()
    {
        $this->downloadsCounter($this->qrcode);

        if(auth()->user()->id != $this->qrcode->user_id)
        {
            return Storage::disk('public')->download($this->qrcode->image_path, 'public_code.png');
        } else {
            return Storage::disk('public')->download($this->qrcode->image_path);
        }

    }

    public function downloadsCounter(QrCode $qrcode)
    {
        app(QrCodeDownloadsCounterService::class)->execute($qrcode);
    }
}
