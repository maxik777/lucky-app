<?php

namespace App\Livewire;

use App\Models\MagicLink;
use Livewire\Component as LivewireComponent;
use Illuminate\Support\Facades\Cache;

class LuckyHistory extends LivewireComponent
{
    public $results = [];

    public function mount($uuid)
    {
        $link = MagicLink::where('uuid', $uuid)->firstOrFail();
        $user = $link->user;
        $this->results = Cache::remember("history_{$user->id}", 5, fn() =>
            $user->luckyResults()->select('number', 'is_win', 'prize')->latest('created_at')->take(3)->get()
        );
    }

    public function render()
    {
        return view('livewire.history');
    }
}
