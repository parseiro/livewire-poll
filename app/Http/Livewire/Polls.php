<?php

namespace App\Http\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render',
    ];
    public function render(): View
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls')
            ->with('polls', $polls)
            ;
    }

    public function vote(Option $option): void
    {
        $option->votes()->create();
    }
}
