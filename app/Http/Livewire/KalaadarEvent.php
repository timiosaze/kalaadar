<?php

namespace App\Http\Livewire;

use App\Http\Resources\TimeResource;
use App\Models\Event;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class KalaadarEvent extends Component
{
    use Actions;
    public $user;
    public $eventname;
    public $eventlink;
    public $locationModal = false;
    public $location;
    public $app_name_slug = 'https://kalaadar.test/';
    public $event_links = [];
    public $description;
    public $showLocation = false;
    public $location_count = 1;
    public $days = [
        ["day"=>"Sun", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Mon", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Tue", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Wed", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Thu", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Fri", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0],
        ["day"=>"Sat", "available"=>true, "activity"=>"Inactive", "value"=>null, "count" => 0]
    ];
    public $alldays = [];
    public $start_time = [];
    public $end_time  =[];
    public $start_id = [];
    public $end_id  =[];
    public $times;
    public $start_date;
    public $end_date;
    protected $listeners = ['foo' => 'setLocation'];
    public $within_range = "Start, End";
    public $calendar_range;
    public $duration = '15';
    public $timezone;
    public $error_time = [];
    public $bookings = 1;
    public $event;
    public $eventlinks;
    public $date_range;
    public $payment;

    public function mount($event)
    {
        $this->event = $event;
        $times =  TimeResource::collection(Time::all());
        $this->times = json_decode(json_encode($times, true), true);
        $this->user = Auth::user();
        $this->timezone = $this->user->timezone;
        foreach ($this->days as $index => $day) {
            $this->start_time[$day['day']] = '08:00';
            $this->end_time[$day['day']] = '16:00';
            $this->error_time[$day['day']] = '';
            array_push($this->alldays, $day['day']);
        }
        
        $this->eventname = $this->event->eventname;
        $this->eventlinks =  $this->event->eventlinks;
        $this->description = $this->event->description;
        $this->location = $this->event->location;
        $this->app_name_slug = $this->event->eventurl;
        $this->event_links = explode(', ', $this->eventlinks);
        $this->duration = $this->event->duration;
        if($this->event->payment()->exists())
        {
            // dd($this->event->payment->payment);

            $this->payment = $this->event->payment->payment;
        }
        if($this->event->bookingevent()->exists()) {
            // dd($this->event->bookingevent()->exists());
            $this->duration = $this->event->bookingevent->duration;
            $this->timezone = $this->event->bookingevent->timezone;
            $this->bookings = $this->event->bookingevent->bookings;
            $this->date_range = $this->event->bookingevent->date_range;
            $this->end_date = $this->event->bookingevent->end_date;
            $this->start_date = $this->event->bookingevent->start_date;
            $this->within_range = $this->start_date . ' to ' . $this->end_date;

        }
        if($this->event->days()->exists()) {
            $this->alldays = [];
            foreach($this->event->days as $day)
            {
                array_push($this->alldays, $day->name);
                // dd($day->start_time);
                // dd($this->start_date);
                $this->start_time[$day->name] = $day->start_time;
                $this->end_time[$day->name] = $day->end_time;
            }
        }
        // dd($this->event_links);
        if(in_array('Location', $this->event_links))
        {
            $this->showLocation = true;
        }

    }

    public function updatedEndTime($value)
    {
        $keys = array_keys($this->error_time);
        for ($i=0; $i < count($keys); $i++) { 
            $this->error_time[$keys[$i]] = '';
        }
        
        // foreach ($this->days as $key => $day) {
        //     $this->error_time[$day['day']] = '';
        // }
        $key = array_keys($this->end_time, $value, false)[0];
        //here $value is the corresponding endtime value
        if($this->start_time[$key] >= $value){
            $this->error_time[$key] = 'Time select error';
        }
        // dd($this->error_time);
    }

    public function updatedStartTime($value)
    {
        $keys = array_keys($this->error_time);
        for ($i=0; $i < count($keys); $i++) { 
            $this->error_time[$keys[$i]] = '';
        }

        $key = array_keys($this->start_time, $value, false)[0];
        //here $value is the corresponding starttime value

        if($this->end_time[$key] <= $value){
            $this->error_time[$key] = 'Time select error';
        }
        // dd($this->error_time);
    }

    // public function location($value)
    // {
    //     if (($key = array_search($value, $this->event_links)) !== false) {
    //         unset($this->event_links[$key]);
    //     } else {
    //         array_push($this->event_links, $value);
    //     }
    // }

    public function setLocation($value)
    {
        if (($key = array_search($value, $this->event_links)) !== false) {
            unset($this->event_links[$key]);
        } else {
            array_push($this->event_links, $value);
        }
    }

    public function setPayment($value)
    {
        $this->payment = $value;
    }

    public function closeModal()
    {
        $this->locationModal = false;
    }

    public function startevent()
    {
        $this->app_name_slug = 'https://kalaadar.test/';
        $name = Str::slug($this->user->name, '-');
        $slug = Str::slug($this->eventname, '-');
        $this->app_name_slug .= $name;
        $this->app_name_slug .='/'.$slug;
        $this->eventlinks = implode(", ", $this->event_links);
        // dd($this->app_name_slug);
        $validator = Validator::make(
            [
                'eventname'  => $this->eventname,
                
            ],
            [
                'eventname' => 'required|min:3',
                
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        } else {
           
            $this->event->user_id = $this->user->id;
            $this->event->eventname = $this->eventname;
            $this->event->eventlinks = $this->eventlinks;
            $this->event->description = $this->description;
            $this->event->eventurl = $this->app_name_slug;
            $this->event->location = $this->location;
            $this->event->save();
            
            $this->notify('Success', 'Event created successfully', 'success', 'dontRefreshPage');
            return;
        }

    }

    public function second_event()
    {
        // dd($this->payment);
        if(count(array_keys($this->error_time, '')) != count($this->error_time)){
            $this->notify('Error', 'Time select error', 'error', 'dontRefreshPage');
            return;
        }
        if($this->date_range == 'thirty_days')
        {
            $this->start_date = Carbon::now()->format('F d, Y');
            $this->end_date = Carbon::now()->add(30, 'day')->format('F d, Y');
        }
        if($this->date_range == 'within_date')
        {
            $dates = explode(' to ', $this->within_range);
            $dates_arr = [];
            foreach($dates as $date){
                $date_created = date_create($date);
                $date_formatted = date_format($date_created,"F d, Y");
                array_push($dates_arr, $date_formatted);
            }
            $this->start_date = $dates_arr[0];
            $this->end_date = $dates_arr[1];
        }
        if($this->date_range == 'future_date')
        {
            $this->start_date = '';
            $this->end_date = '';
        }
        // dd($this->bookings, $this->duration, $this->timezone, $this->date_range, $this->start_date, $this->end_date);
        $days = [];
        foreach($this->alldays as $index => $value) 
        {
            $days[$index] = [
                'user_id' => $this->user->id,
                'event_id' => $this->event->id,
                'name' => $value,
                'start_time' => $this->start_time[$value],
                'end_time' => $this->end_time[$value],
                'start_id' => Time::where('time', $this->start_time[$value])->value('id'),
                'end_id' => Time::where('time', $this->end_time[$value])->value('id'),
            ];
        }
        // dd($days);
        $days_exists = DB::table('days')->where('event_id', $this->event->id)->count() > 0;
        $booking_exists = DB::table('booking_events')->where('event_id', $this->event->id)->count() > 0;
        if($days_exists)
        {
            $this->event->days()->delete();
            $this->event->days()->createMany($days); 
        } else {
            $this->event->days()->createMany($days); 
        }

        if($booking_exists) {

            $this->event->bookingevent()->delete();
            $bookings = [
                            'user_id' => $this->user->id,
                            'event_id' => $this->event->id,
                            'duration' => $this->duration,
                            'timezone' => $this->timezone,
                            'bookings' => $this->bookings,
                            'date_range' => $this->date_range,
                            'end_date' => $this->end_date,
                            'start_date' => $this->start_date
                        ];
            $this->event->bookingevent()->create($bookings);

        } else {

            $bookings = [
                        'user_id' => $this->user->id,
                        'event_id' => $this->event->id,
                        'duration' => $this->duration,
                        'timezone' => $this->timezone,
                        'bookings' => $this->bookings,
                        'date_range' => $this->date_range,
                        'end_date' => $this->end_date,
                        'start_date' => $this->start_date
                    ];
            $this->event->bookingevent()->create($bookings);
        }
        
        
        $this->notify('Success', 'Bookings successfully set', 'success', 'dontRefreshPage');
        return;
    }

    public function choose_payment()
    {
        $payment_exists = DB::table('payments')->where('event_id', $this->event->id)->count() > 0;

        $validator = Validator::make(
            [
                'payment'  => $this->payment,
                
            ],
            [
                'payment' => 'required',
                
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        }
        $payment = [
            'user_id' => $this->user->id,
            'event_id' => $this->event->id,
            'payment' => $this->payment,
        ];

        if($payment_exists)
        {
            $this->event->payment()->delete();
            $this->event->payment()->create($payment);
        } else {
            $this->event->payment()->create($payment);
        }

        
        $this->notify('Success', 'Payment Method Successfully Saved', 'success', 'dontRefreshPage');
        return;
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

    public function addLocation()
    {
        // $this->location_count++;
        array_push($this->event_links, '');
    }

    public function removeLocation()
    {
        // $this->location_count--;    
        array_pop($this->event_links);
        $this->dispatchBrowserEvent('refresh-page');

    }

    public function dontRefreshPage()
    {

    }



    public function addTimes($index)
    {
        $value = $this->days[$index]['day'] . $this->days[$index]['count'];
        $this->start_time[$value] = '08:00';
        $this->end_time[$value] = '16:00';
        $this->error_time[$value] = '';
        array_push($this->alldays, $value);
        $this->days[$index]['count']++;

        // dd($this->start_time);
        // $day['count']++;
    }
    
    public function remove($index)
    {
        
        // $value = $this->days[$index]['day'] . $this->days[$index]['count'] + 1;
        // unset($this->error_time[$value]);
        // unset($this->start_time[$value]);
        // unset($this->end_time[$value]);
        // 
    }
    public function removeOthers($i, $index)
    {
        // dd($this->start_time[$value]);  
        if($this->days[$index]['count'] == 1){
            $value = $this->days[$index]['day'] . $i;
            unset($this->error_time[$value]);
            unset($this->start_time[$value]);
            unset($this->end_time[$value]);
            if (($key = array_search($value, $this->alldays)) !== false) {
                // dd($key);
                unset($this->alldays[$key]);
            }
        } else {
            $value = $this->days[$index]['day'] . $i + 1;
            unset($this->error_time[$value]);
            unset($this->start_time[$value]);
            unset($this->end_time[$value]);
            if (($key = array_search($value, $this->alldays)) !== false) {
                // dd($key);
                unset($this->alldays[$key]);
            }
        }
        $this->days[$index]['count']--;

        // dd($value);

    }

    public function render()
    {
        return view('livewire.kalaadar-event');
    }
}
