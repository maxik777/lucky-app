<?php

namespace App\Livewire;

use App\Jobs\StoreLuckyResult;
use Livewire\Component;
use App\Models\MagicLink;

class LinkPage extends Component
{
    public MagicLink $link;
    public array $result = [];

    public function mount($uuid)
    {
        $this->link = MagicLink::where('uuid', $uuid)->where('is_active', true)->firstOrFail();
        abort_if($this->link->isExpired(), 403);
    }

    public function generateNew()
    {
        $this->link->deactivate();
        $this->link = MagicLink::createNewFor($this->link->user);
    }

    public function deactivate()
    {
        $this->link->deactivate();
    }

    public function play()
    {
        $this->result = $this->link->user->playLuckyGame();

        StoreLuckyResult::dispatch($this->link->user, $this->result);
    }

    public function render()
    {
        return view('livewire.link');
    }
}
