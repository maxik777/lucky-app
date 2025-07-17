<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreLuckyResult implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public array $result
    ) {}

    public function handle(): void
    {
        $this->user->luckyResults()->create([
            'number' => $this->result['number'],
            'is_win' => $this->result['isWin'],
            'prize' => $this->result['prize'],
        ]);
    }
}
