<div>
  <form wire:submit.prevent="createPoll">
    <label>Nome da enquete</label>
    <label>
      <input
        type="text"
        wire:model.defer="pollTitle"
      />
    </label>

    @error('pollTitle')
    <div class="text-red-500">{{ $message }}</div>
    @enderror

    <div class="mb-4 mt-5">
      <button
        type="button"
        class="btn"
        wire:click.prevent="addOption"
      >
        Adicionar opção
      </button>
    </div>

    <div>
      @foreach($pollOptions as $index => $option)
        <div class="mb-4 flex flex-row gap-y-4 items-center justify-between">
          <input
            {{--id="{{ $id }}"--}}
            type="text"
            wire:model.defer="pollOptions.{{ $index }}"
          />
          <button
            class="btn mt-5"
            wire:click.prevent="removeOption({{ $index }})"
          >Remove
          </button>
        </div>
        @error('pollOptions.' . $index)
        <div class="text-red-500">{{ $message }}</div>
        @enderror
      @endforeach
    </div>

    <button type="button" class="btn" wire:click.prevent="createPoll">Enviar</button>
  </form>
</div>
