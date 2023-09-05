<?php

namespace App\Livewire\Codes\User;

use App\Services\QrCode\User\GetAllUserQrCodesService;
use App\Services\QrCode\User\GetSearchedByNameUserQrCodesService;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class UserCodes extends Component
{
    use WithPagination;

    public string $routeName = 'qrcodes';
    public string $search = '';
    public bool $userHasCodes = false;
    public int $qrcodeId;

    public function render()
    {
        $qrcodes = app(GetAllUserQrCodesService::class)->execute(auth()->user()->id);

        $this->userHasCodes = count($qrcodes) ? true : false;

        if($this->search != '')
        {
            $qrcodes = app(GetSearchedByNameUserQrCodesService::class)->execute(auth()->user()->id, $this->search);
        }

        return view('livewire.codes.user.user-codes', [
            'qrcodes' => $qrcodes,
        ]);
    }
}
