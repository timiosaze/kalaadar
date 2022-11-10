<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuestionModal extends Component
{
    public bool $cardModal = false;
    public $question;
    public function save()
    {
        $this->cardModal = false;
        $this->emit('addQuestion', $this->question);
    }

    public function render()
    {
        return view('livewire.question-modal');
    }
}
