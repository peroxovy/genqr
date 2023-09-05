<?php

namespace App\Livewire\Modals;

use App\Livewire\Codes\User\UserCodes;
use LivewireUI\Modal\ModalComponent;
use App\Services\ErrorCorrection\GetAllErrorCorrectionsAsKeyValueArrayService;
use App\Services\QrCode\QrCodeService;
use App\Services\QrCodeType\GetAllQrCodeTypesAsKeyValueArrayService;
use Exception;

class CodeCreateModal extends ModalComponent
{
    public $form = [
        'error_correction' => 'M',
        'image_size' => 100,
        'code_type' => 'text',
    ];

    // In Livewire 3, validation rules like 'required_if' dont work inside FormComponent :(
    protected $rules = [
        'form.name' => 'required|string',
        'form.description' => 'required|string',
        'form.is_public' => 'nullable|boolean',
        'form.error_correction' => 'required|string|exists:error_corrections,error_correction_key',
        'form.image_size' => 'required|numeric|min:100|max:300',
        'form.code_type' => 'required|string|exists:qr_code_types,type_key',
        'form.text' => 'required_if:form.code_type,text|string',
        'form.url' => 'required_if:form.code_type,url|string',
        'form.email' => 'required_if:form.code_type,email|email',
        'form.phone' => 'required_if:form.code_type,phone|numeric',
        'form.latitude' => 'required_if:form.code_type,gps|numeric|between:-90,90',
        'form.longitude' => 'required_if:form.code_type,gps|numeric|between:-180,180',
        'form.wifi_ssid' => 'required_if:form.code_type,wifi|string',
        'form.wifi_password' => 'required_if:form.code_type,wifi|string',
        'form.wifi_encryption' => 'required_if:form.code_type,wifi|string',
        'form.wifi_is_hidden' => 'nullable|boolean',
    ];

    public function render()
    {
        $qr_code_types = app(GetAllQrCodeTypesAsKeyValueArrayService::class)->execute();
        $error_corrections = app(GetAllErrorCorrectionsAsKeyValueArrayService::class)->execute();

        return view('livewire.modals.code-create-modal', ['qr_code_types' => $qr_code_types, 'error_corrections' => $error_corrections]);
    }

    public function store()
    {
        $validated = $this->validate();

        try{
            $qrcode = app(QrCodeService::class)->createQrCode(auth()->user(), $validated['form']);
        } catch (Exception $e) {
            session()->flash('error', 'Cannot generate QR Code due to following error: ' . $e->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Successfuly generated QR Code!');

        return $this->redirect(UserCodes::class);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
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
