<?php

namespace App\Livewire\Codes\Dashboard;

use App\Models\QrCode;
use Livewire\Component;

class CodeCard extends Component
{
    public QrCode $qrcode;

    public string $ownership;

    public function mount($qrcode, $ownership)
    {
        $this->ownership = $ownership;
        $this->qrcode = $qrcode;
    }
    public function render()
    {
        return view('livewire.codes.dashboard.code-card');
    }
}
