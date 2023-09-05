<?php

namespace App\Livewire\Codes\Community;

use App\Services\QrCode\Community\GetAllCommunityQrCodesService;
use App\Services\QrCode\Community\GetSearchedByNameCommunityQrCodesService;
use App\Services\QrCode\User\GetLatestUserQrCodesService;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;


class CommunityCodes extends Component
{
    use WithPagination;

    public string $routeName = 'community';
    public bool $communityHasCodes = false;
    public string $search = '';
    public int $qrcodeId;

    public function render()
    {
        $qrcodes = app(GetAllCommunityQrCodesService::class)->execute(auth()->user()->id);

        $this->communityHasCodes = count($qrcodes) ? true : false;

        if($this->search != '')
        {
            $qrcodes = app(GetSearchedByNameCommunityQrCodesService::class)->execute(auth()->user()->id, $this->search);
        }

        return view('livewire.codes.community.community-codes', [
            'qrcodes' => $qrcodes,
        ]);
    }
}
