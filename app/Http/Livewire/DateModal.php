<?php

namespace App\Http\Livewire;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class DateModal extends Component
{
    use Actions;
    public $currentStep = 1;
    public $datemodal = false;
    public $times;
    public $dates;
    public $datesArr = [];
    public $formattedDates= [];
    public function mount()
    {
        $times =  TimeResource::collection(Time::all());
        $this->times = json_decode(json_encode($times, true), true);
        // dd($this->times);

    }

    public function datesArray()
    {
        $this->datesArr = explode(', ', $this->dates);
        foreach ($this->datesArr as $value) {
            $this->formattedDates[Carbon::parse($value)->format('jS, M, Y')] = '';
        }
        $this->datemodal = true;
    }

    public function save()
    {
        dd($this->formattedDates);
    }


    public function render()
    {
        return view('livewire.date-modal');
    }
}
