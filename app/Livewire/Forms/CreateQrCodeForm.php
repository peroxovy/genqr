<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateQrCodeForm extends Form
{
    #[Rule('required|string|min:3|max:30', onUpdate: false)]
    public $name;

    #[Rule('required|string|min:3|max:255', onUpdate: false)]
    public $description;

    #[Rule('nullable|boolean', onUpdate: false)]
    public $is_public;

    #[Rule('required|string|exists:error_corrections,error_correction_key', onUpdate: false)]
    public $error_correction = 'M';

    #[Rule('required|numeric|min:100|max:300')]
    public $image_size = 100;

    #[Rule('required|string|exists:qr_code_types,type_key')]
    public $code_type = 'text';

    // #[Rule('required_if:code_type,text|string')]
    #[Rule('nullable|string')]
    public $text;

    // #[Rule('nullable|required_if:code_type,url|string')]
    #[Rule('nullable|string')]
    public $url;

    // #[Rule('required_if:code_type,email|email', onUpdate: false)]
    #[Rule('nullable|email', onUpdate: false)]
    public $email;

    // #[Rule('required_if:code_type,phone|string', onUpdate: false)]
    #[Rule('nullable|string', onUpdate: false)]
    public $phone;

    // #[Rule('required_if:code_type,gps|numeric|between:-90,90', onUpdate: false)]
    #[Rule('nullable|numeric|between:-90,90', onUpdate: false)]
    public $latitude;

    // #[Rule('required_if:code_type,gps|numeric|between:-180,180', onUpdate: false)]
    #[Rule('nullable|numeric|between:-180,180', onUpdate: false)]
    public $longitude;

    // #[Rule('required_if:code_type,wifi|string', onUpdate: false)]
    #[Rule('nullable|string', onUpdate: false)]
    public $wifi_ssid;

    // #[Rule('required_if:code_type,wifi|string', onUpdate: false)]
    #[Rule('nullable|string', onUpdate: false)]
    public $wifi_password;

    // #[Rule('required_if:code_type,wifi|string', onUpdate: false)]
    #[Rule('nullable|string', onUpdate: false)]
    public $wifi_encryption;

    // #[Rule('nullable|boolean', onUpdate: false)]
    #[Rule('nullable|boolean', onUpdate: false)]
    public $wifi_is_hidden;


}
