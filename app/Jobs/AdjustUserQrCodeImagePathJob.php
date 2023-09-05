<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AdjustUserQrCodeImagePathJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1200;
    private User $user;
    private string $oldname;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, string $oldname)
    {
        $this->user = $user;
        $this->oldname = $oldname;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $qrcodes = $this->user->qr_codes;

        foreach($qrcodes as $qrcode)
        {
            $qrcode->image_path = str_replace($this->oldname, $this->user->username, $qrcode->image_path);
            $qrcode->save();
        }
    }
}
