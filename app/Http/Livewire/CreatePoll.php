<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreatePoll extends Component
{
  public string $pollTitle;

  public $pollOptions = [];

  protected $rules = [
    'pollTitle' => 'required|min:5|max:100',
    'pollOptions' => 'required|array|min:2|max:10',
    'pollOptions.*' => 'required|min:1|max:100',
  ];

  protected $messages = [
    'pollOptions.*.required' => 'The option cannot be empty.',

  ];

  public function render(): View
  {
    return view('livewire.create-poll');
  }

  public function addOption(): void
  {
    $this->pollOptions[] = '';
  }

  public function removeOption($index): void
  {
    unset($this->pollOptions[$index]);
    $this->pollOptions = array_values($this->pollOptions);
  }

  public function createPoll(): void
  {
    $this->validate();

    Poll::create([
      'title' => $this->pollTitle,
    ])->options()->createMany(
      $this->pollOptions->collect()->map(fn($option) => ['name' => $option])
    );

    $this->resetExcept();
  }

  public function updated($propertyName): void
  {
    $this->validateOnly($propertyName);
  }
}
