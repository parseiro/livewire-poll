<div>
    <form>
        <label>Nome da enquete</label>
        <input
            type="text"
            wire:model.lazy="title"
        />

        <div class="mb-4 mt-5">
            <button
                class="btn"
                wire:click.prevent="addOption"
            >
                Adicionar opção
            </button>
        </div>

        <div>
            @foreach($options as $index => $option)
                <div class="mb-4 flex flex-row gap-y-4 items-center justify-between">
                    <label>{{ $index + 1 }}</label>
                    <input
                        type="text"
                        wire:model.lazy="options.{{ $index }}"
                    />
                    <button
                        class="btn"
                        wire:click.prevent="removeOption({{ $index }})"

                    >Remove</button>
                </div>
            @endforeach
        </div>
    </form>
</div>
