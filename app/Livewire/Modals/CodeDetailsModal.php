<?php

namespace App\Livewire\Modals;

use App\Models\QrCode;
use App\Services\QrCodeDetails\QrCodeViewsCounterService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CodeDetailsModal extends ModalComponent
{
    public int $qrcodeId;
    public QrCode $qrcode;

    public function render()
    {
        $this->qrcode = QrCode::with('qr_code_details')->findOrFail($this->qrcodeId);

        $this->viewsCounter($this->qrcode);

        return view('livewire.modals.code-details-modal', [ 'qrcode' => $this->qrcode ]);
    }

    public function changePrivacy()
    {
        $this->qrcode->is_public = !$this->qrcode->is_public;
        $this->qrcode->save();
    }

    public function viewsCounter(QrCode $qrcode)
    {
        if($qrcode->user_id != auth()->user()->id)
        {
            app(QrCodeViewsCounterService::class)->execute($qrcode);
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

}
