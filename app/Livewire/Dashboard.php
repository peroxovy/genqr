<?php

namespace App\Livewire;

use App\Services\QrCode\Community\GetLatestCommunityQrCodesService;
use App\Services\QrCode\User\GetLatestUserQrCodesService;
use Livewire\Component;

class Dashboard extends Component
{
    public string $routeName = 'dashboard';
    public int $userId = 0;
    public $userQrCodes;
    public $communityQrCodes;

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->userQrCodes = app(GetLatestUserQrCodesService::class)->execute($this->userId);
        $this->communityQrCodes = app(GetLatestCommunityQrCodesService::class)->execute($this->userId);
    }

    public function render()
    {
        return view('livewire.dashboard', ['userQrCodes' => $this->userQrCodes, 'communityQrCodes' => $this->communityQrCodes]);
    }
}
