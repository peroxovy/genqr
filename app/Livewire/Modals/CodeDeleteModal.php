<?php

namespace App\Livewire\Modals;

use App\Livewire\Codes\User\UserCodes;
use App\Models\QrCode;
use App\Services\QrCode\QrCodeService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CodeDeleteModal extends ModalComponent
{
    public int $qrcodeId;
    public QrCode $qrcode;

    public function render()
    {
        return view('livewire.modals.code-delete-modal', ['qrcodeId' => $this->qrcodeId]);
    }

    public function delete(int $id)
    {
        if(!app(QrCodeService::class)->deleteQrCode($id))
        {
            session()->flash('error', 'Cannot delete QR Code :(');
        } else {
            session()->flash('success', 'Successfuly deleted QR Code!');
        }

        return $this->redirect(UserCodes::class);
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
