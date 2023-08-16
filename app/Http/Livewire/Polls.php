<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;
use Carbon\Traits\Options;

class Polls extends Component
{

    protected $listeners = [
        'pollcreated' => 'render'
    ];
    public function render()
    {
        $polls = \App\Models\Poll::with('Option.Vote')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function addVote(Option $option){
        $option->Vote()->create();

    }
}
