<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption() {
        $this->options[] = '';
    }

    public function removeOption($index) {
        unset($this->options[$index]);
    }

//    public function mount()
//    {
//    }
}
