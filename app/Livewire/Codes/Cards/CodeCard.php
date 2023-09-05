<?php

namespace App\Livewire\Codes\Cards;

use App\Models\QrCode;
use Livewire\Component;

class CodeCard extends Component
{
    public QrCode $qrcode;
    public $routeName = '';

    public function mount($qrcode, $routeName)
    {
        $this->routeName = $routeName;
        $this->qrcode = $qrcode;
    }

    public function render()
    {
        return view('livewire.codes.cards.code-card');
    }
}
