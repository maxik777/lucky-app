<div class="container mx-auto p-4">
    <h2 class="text-xl font-semibold mb-4">Your Last 3 Lucky Draws</h2>

    @forelse($results as $result)
        <div class="p-3 mb-2 border rounded {{ $result->is_win ? 'bg-green-100' : 'bg-red-100' }}">
            <p><strong>Number:</strong> {{ $result->number }}</p>
            <p><strong>Result:</strong> {{ $result->is_win ? 'Win' : 'Loss' }}</p>
            <p><strong>Prize:</strong> {{ $result->prize }}</p>
        </div>
    @empty
        <p class="text-gray-500">No games played yet.</p>
    @endforelse

    <a href="{{ url()->previous() }}" class="inline-block mt-4 text-blue-500 underline">← Back</a>
</div>
