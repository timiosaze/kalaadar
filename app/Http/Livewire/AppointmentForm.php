<?php

namespace App\Http\Livewire;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class AppointmentForm extends Component
{
    use Actions;
    public $progressBar = 25;
    public $link = 'Add a location';
    public $currentStep = 2;
    public $app_name;
    public $description;
    public $timezone;
    public $duration;
    public $custom;
    public $timevar;
    public $timetype = ['minutes', 'hours'];
    public $book_multiple_times = false;
    protected $listeners = ['addQuestion'];
    public $start_time = ['Start','Start','Start','Start','Start','Start','Start'];
    public $end_time = ['End','End','End','End','End','End','End'];
    public $days = [
        ["day"=>"Sun", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Mon", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Tues", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Wed", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Thur", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Fri", "available"=>false, "activity"=>"Inactive", "value"=>null],
        ["day"=>"Sat", "available"=>false, "activity"=>"Inactive", "value"=>null]
    ];
    
    public $times;
    public $questions = ['Fullname' => '', 'Phonenumber' => '', 'Email' => ''];
    public $required_detail;
    public $payment_amount;
    public $payment_mode;
    public $time_error = '';
    public function mount()
    {
        $times =  TimeResource::collection(Time::all());
        $this->times = json_decode(json_encode($times, true), true);
        // dd($this->times);

    }

    public function check()
    {
        foreach($this->start_time as $index => $value ) {
            if($this->start_time[$index] < $this->end_time[$index]){
                $this->time_error = 'Start time must be less than your End time';
                $this->notify('Error', $this->time_error, 'error', 'dontRefreshPage');
                return;
            }
        }
    }

    public function addQuestion($question)
    {
        $this->questions[$question] = '';
        // dd($this->questions);
    }

    public function toggle($index)
    {
        $this->days[$index]['available'] = ! $this->days[$index]['available'];
        // dd($this->days);
    }

    public function first()
    {
        $validator = Validator::make(
            [
                'app_name'  => $this->app_name,
                'link'  => $this->link,
                'description' => $this->description
            ],
            [
                'app_name' => 'required',
                'link' => ['required',Rule::notIn(['Add a location']), ], 
                'description' => 'required'
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        } else {
            $this->progressBar = 50;
            $this->currentStep = 2;
        }
     
    }

    public function refreshPage()
    {
        $this->dispatchBrowserEvent('refresh-page');
    }

    public function dontRefreshPage()
    {
        // $this->dispatchBrowserEvent('refresh-page');
    }

    public function second()
    {
        $var = $this->custom . ' ' . $this->timevar;
        dd($var);
    }

    public function submit()
    {

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

    public function render()
    {
        return view('livewire.appointment-form');
    }
}
