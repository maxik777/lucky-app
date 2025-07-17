<div class="card p-4 shadow-sm bg-white">
    <h2 class="mb-3 text-center">Welcome, {{ $link->user->username }}</h2>
    <p><strong>Magic Link UUID:</strong> {{ $link->uuid }}</p>
    <p><strong>Expires at:</strong> {{ $link->expires_at }}</p>

    @if (!$link->isExpired())
        <div class="mt-3 d-flex gap-2 ">
            <button wire:click="play" class="btn btn-success" type="button">🎲 I'm Feeling Lucky</button>
            <button wire:click="generateNew" class="btn btn-secondary" type="button">♻️ Generate New Link</button>
            <button wire:click="deactivate" class="btn btn-danger" type="button">❌ Deactivate</button>
            <a href="{{ route('link.page', $link->uuid) }}" class="btn btn-outline-info">🔁 Refresh</a>
            <a href="{{ route('link.history', $link->uuid) }}" class="btn btn-outline-dark">📜 View History</a>
        </div>
    @else
        <div class="alert alert-warning mt-3">This link has expired.</div>
    @endif

    @if (!empty($result))
        <hr>
        <h4>🎉 Lucky Game Result</h4>
        <ul>
            <li><strong>Number:</strong> {{ $result['number'] }}</li>
            <li><strong>Win:</strong> {{ $result['isWin'] ? 'Yes' : 'No' }}</li>
            <li><strong>Prize:</strong> ${{ $result['prize'] }}</li>
        </ul>
    @endif
</div>
