<?php

namespace App\Livewire;

use App\Models\QrCode;
use App\Services\Likeable\LikeService;
use Livewire\Component;

class LikeButton extends Component
{
    public QrCode $qrcode;
    public bool $isLiked = false;

    public function mount()
    {
        $this->isLiked = app(LikeService::class)->isLiked(auth()->user(), $this->qrcode);
    }

    public function render()
    {
        return view('livewire.like-button', ['qrcode' => $this->qrcode]);
    }

    public function like()
    {
        app(LikeService::class)->handleLike(auth()->user(), $this->qrcode);
        $this->updateLike();
    }

    public function updateLike()
    {
        $this->isLiked = !$this->isLiked;
    }
}
