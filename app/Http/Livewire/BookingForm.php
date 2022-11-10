<?php

namespace App\Http\Livewire;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use WireUi\Traits\Actions;

class BookingForm extends Component
{
    use Actions;
    public $currentStep = 2;
    public $datemodal = false;
    public $times;
    public $dates;
    public $datesArr = [];
    public $formattedDates= [];
    public $questions = ['Fullname' => '', 'Phonenumber' => '', 'Email' => ''];
    public $amount = 10;
    public $userid = 1;
    public function mount()
    {
        $times =  TimeResource::collection(Time::all());
        $this->times = json_decode(json_encode($times, true), true);
        // dd($this->times);

    }

    public function datesArray()
    {
        $validator = Validator::make(
            [
                'dates'  => $this->dates,
            ],
            [
                'dates' => 'required',
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        }

        $this->datesArr = explode(', ', $this->dates);
        foreach ($this->datesArr as $value) {
            $this->formattedDates[Carbon::parse($value)->format('jS, M, Y')] = '';
        }
        $this->datemodal = true;
    }

    public function save()
    {
        if (in_array(null, $this->formattedDates , true) || in_array('', $this->formattedDates, true)) {
            $this->datemodal = false;
            $this->notify('Error','Time available not set', 'error', 'dontRefreshPage');
            return;
        }
        $this->datemodal = false;
        $this->notify('Success', 'Booking time added successfully', 'success', 'next');
        return;
    }

    public function second()
    {
        if (in_array(null, $this->formattedDates , true) || in_array('', $this->formattedDates, true)) {
            $this->notify('Error','Question not filled', 'error', 'dontRefreshPage');
            return;
        }
        $this->notify('Success', 'Details filled successfully', 'success', 'pay');
        return;
    }

    public function notify($title, $desc, $icon, $method)
    {
        return  $this->notification([
            'title'       => $title,
            'description' => $desc,
            'icon'        => $icon,
            'timeout'     => 2500,
            'onTimeout' => [
                'method' => $method,
                'params' => ['onTimeout'],
            ],
        ]);
    }

    public function pay()
    {
        return redirect()->route('payment_view');
    }

    public function refreshPage()
    {
        $this->dispatchBrowserEvent('refresh-page');
    }

    public function next()
    {
        $this->currentStep = 2;
        // $this->dispatchBrowserEvent('refresh-page');
    }
    public function dontRefreshPage()
    {

    }
    
    public function render()
    {
        return view('livewire.booking-form');
    }
}
