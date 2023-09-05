<?php

namespace App\Livewire\Profile\Show;

use App\Models\QrCode;
use App\Models\User;
use App\Services\QrCode\User\GetAllUserQrCodesService;
use App\Services\User\Details\ProfileViewsCounterService;
use App\Services\User\Profile\Show\ShowUserProfileService;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserProfile extends Component
{
    use WithPagination;

    public User $user;

    public function mount($id)
    {
        $this->user = app(ShowUserProfileService::class)->execute($id);
        $this->viewsCounter($this->user);
    }

    public function render()
    {
        return view('livewire.profile.show.show-user-profile');
    }

    public function viewsCounter(User $user)
    {
        if($user->id != auth()->user()->id)
        {
            app(ProfileViewsCounterService::class)->execute($user);
        }
    }
}
