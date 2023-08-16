<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Doctrine\Inflector\Rules\Turkish\Rules;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];
    protected $rules = [
        'title' => 'required|min:3|max:225|',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:225'
    ];

    protected $messages = [
        'options.*' => "Options can't be empty"
    ];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();
        // $poll = Poll::create([
        //     'title' => $this->title,
        // ]);
        // foreach($this->options as $optionName)
        // {
        //     $poll->Option()->create(['name'=> $optionName]);
        // }


        Poll::create([
            'title' => $this->title,
        ])->Option()->createMany(
                collect($this->options)
                    ->map(fn($option)=> ['name'=>$option])
                    ->all()
            );
        $this->reset(['title', 'options']);
        $this->emit('pollcreated');
    }
}
