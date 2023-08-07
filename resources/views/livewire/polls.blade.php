<div>
    @forelse($polls as $poll)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">{{ $poll->title }}</h3>
            @foreach($poll->options as $option)
                <div class="mb-2 flex gap-2">
                    <button type="button"
                            class="btn"
                            wire:click.prevent="vote({{$option}})"
                    >
                        Votar
                    </button>
                    ({{$option->votes->count()}}) {{$option->name}}
                </div>
            @endforeach
        </div>
    @empty
        <p class="text-gray-500">Não há enquetes disponíveis.</p>
    @endforelse
</div>
