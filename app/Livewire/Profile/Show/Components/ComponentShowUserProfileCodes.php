<?php

namespace App\Livewire\Profile\Show\Components;

use App\Models\QrCode;
use App\Models\User;
use App\Services\User\Profile\Show\ShowUserQrCodesService;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentShowUserProfileCodes extends Component
{
    use WithPagination;

    public int $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $qrcodes = app(ShowUserQrCodesService::class)->execute($this->userId);
        return view('livewire.profile.show.components.component-show-user-profile-codes', ['qrcodes' => $qrcodes]);
    }
}
