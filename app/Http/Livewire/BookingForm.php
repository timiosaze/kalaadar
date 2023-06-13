<?php

namespace App\Http\Livewire;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use WireUi\Traits\Actions;

class BookingForm extends Component
{
    use Actions;
    public $timeModal = false;
    public $selected_day;
    public $data = ['topic' => '', 'start_time' => '', 'duration' => '', 'timezone' => ''];
    public $selected_time;
    public $end_time;
    public $currentStep = 1;
    public $datemodal = false;
    public $keys = [];
    public $date;
    public $event_links;
    public $link;
    public $start_end = array();
    public $arr_times = [];
    public $dates;
    public $user_times = [];
    public $datesArr = [];
    public $formattedDates= [];
    public $weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    public $available_times = array();
    public $questions = ['Fullname' => '', 'Phonenumber' => '', 'Email' => ''];
    public $amount = 10;
    public $duration;
    public $selected_days = [];
    public $userid = 1;
    public $event;
    public $range;
    public $times;
    protected $listeners = ['getWeekDay'];

    public $switch = false;
    public function mount($event)
    {
        $times =  TimeResource::collection(Time::all());
        $this->times = json_decode(json_encode($times, true), true);
        $this->event = $event;
        $this->event_links = explode(', ', $this->event[0]->eventlinks);
        $times_collection = collect($this->times);
        // dd($times_collection->firstWhere('id', 64)['time']);
        foreach ($this->event[0]->days as $day) {
            # code...
            // dd($this->available_times);
            $this->start_end[$day->name] = [];
            $this->available_times[$day->name] = [];
            array_push($this->available_times[$day->name], $day->start_time);
            array_push($this->available_times[$day->name],
             $day->end_time);
            // dd($day->start_id);
            array_push($this->start_end[$day->name], $day->start_id);
            array_push($this->start_end[$day->name], $day->end_id);
            $key = array_search($day->name, $this->weekdays);
            array_push($this->selected_days, $key);
            array_push($this->keys, $this->weekdays[$key]);
        }
        $this->selected_day = $this->keys[1];
        // dd($this->keys);
        $this->duration = $this->event[0]->bookingevent->duration;
        $this->range = (int) $this->duration / 15;
        foreach ($this->start_end as $key => $value) {
            $times_arr = [];
            $start  = $value[0];
            $end    = $value[1];
            $this->user_times[$key] = [];
            for ($i=$start; $i <= $end; $i+=$this->range) { 
                $time = Time::where('id', $i)->value('time');
                array_push($times_arr, $time);
            }
            array_push($this->user_times[$key], $times_arr);
        }
        // dd($this->user_times['Wed'][0]);
        $this->data['topic'] = $this->event[0]->eventname;
        $this->data['duration'] = $this->event[0]->bookingevent->duration;
        $this->data['timezone'] = $this->event[0]->bookingevent->timezone;
    }

    public function getWeekDay($key, $fulldate)
    {
        $this->date = $fulldate;
        // dd($this->date);
        $this->selected_day = $this->weekdays[$key];
        // dd($this->selected_day, $key, $this->weekdays);
        // dd($this->user_times[$this->selected_day]);
        
        $this->switch = true;
        $this->dispatchBrowserEvent('render-calendar');
    }

    public function confirmTime($time)
    {
        $this->selected_time = $time;
        $id = Time::where('time', $this->selected_time)->value('id');
        $endid = $id + $this->range;
        $this->end_time = Time::where('id', $endid)->value('time');
        $this->timeModal = ! $this->timeModal;

        $this->dispatchBrowserEvent('render-calendar');
    }

    public function saveBooking()
    {
        $this->timeModal = false;

        $this->data['start_time'] = $this->selected_time;

        $booking_exists = DB::table('bookings')->where('event_id', $this->event[0]->id)->count() > 0;
        $this->dispatchBrowserEvent('render-calendar');
        // dd($booking_exists);
        $bookings = [
            'user_id' => Auth::id(),
            'event_id' => $this->event[0]->id,
            'booking_date' => $this->date,
            'start_time' => $this->selected_time,
            'end_time' => $this->end_time,
        ];

        if($booking_exists) {
            $this->event[0]->booking()->delete();
            $this->event[0]->booking()->create($bookings);
        } else {
            $this->event[0]->booking()->create($bookings);
        }
        $this->notify('Success', 'Booking time added successfully', 'success', 'next');
        return;
    }

    public function bookingDetail()
    {
        $booking_detail_exists = DB::table('booking_details')->where('event_id', $this->event[0]->id)->count() > 0;
        $nonEmptyQuestions = array_filter($this->questions);
        if ($this->link == null || count($nonEmptyQuestions) !== count($this->questions)) {
            $this->notify('Error', 'All fields must be filled', 'error', 'dontRefreshPage');
            return;
        }
       
        $booking_detail = [
            'user_id' => Auth::id(),
            'event_id' => $this->event[0]->id,
            'booking_id' => $this->event[0]->booking->id,
            'fullname' => $this->questions['Fullname'],
            'phonenumber' => $this->questions['Phonenumber'],
            'email' => $this->questions['Email'],
            'location' => $this->link
        ];
        if($booking_detail_exists) {
            $this->event[0]->bookingdetail()->delete();
            $this->event[0]->bookingdetail()->create($booking_detail);
            // echo "Done";
        } else {
            $this->event[0]->bookingdetail()->create($booking_detail);
            // echo "Done";

        }
        // dd($booking_detail);
        // dd($this->questions, $this->link);
        $location = $this->event[0]->bookingdetail->location;
        // dd($location);
        if($location == 'Zoom'){
            return redirect()->route('zoom.create', ['event' => $this->event[0]]);
        }
        if($location == 'Google Meet'){
            return redirect()->route('google.create', ['event' => $this->event[0], 'option' => 'google']);
        }

    }        // 

    public function renderCalendar()
    {
       
    }

    // public function switch()
    // {
    //     if($this->switch == 'dates')
    //     {
    //         $this->switch = 'set_times';
    //     } else {
    //         $this->switch = 'dates';
    //     }
    // }

    public function setTime($index)
    {
       array_push($this->arr_times, $index);
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
            'timeout'     => 1500,
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
