<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class NewEvent extends Component
{
    use Actions;
    
    public $user;
    public $eventname;
    public $description = '';
    public $location = '';
    public $app_name_slug = 'https://kalaadar.test/';
    public $event_links = [];
    public $eventlinks = '';
    public $events;
    protected $listeners = ['foo' => 'setLocation'];


    public function mount()
    {
        $this->user = Auth::user();
        $this->events = Event::all();
    }

    public function create_event()
    {
        // dd($this->eventname, $this->description, $this->location, $this->event_links);
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
                'eventurl' => $this->app_name_slug,
            ],
            [
                'eventname' => 'required|min:3',
                'eventurl' => 'required|unique:events',
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage', 3);
            return;
        }

        $event = new Event();
        $event->user_id = $this->user->id;
        $event->eventname = $this->eventname;
        $event->eventlinks = $this->eventlinks;
        $event->description = $this->description;
        $event->eventurl = $this->app_name_slug;
        $event->location = $this->location;
        $event->save();
        
        $this->notify('Success', 'Event created successfully', 'success', 'next', $event->id);
        return;
    }

    public function dontRefreshPage()
    {

    }

    public function setLocation($value)
    {
        if (($key = array_search($value, $this->event_links)) !== false) {
            unset($this->event_links[$key]);

        } else {
            array_push($this->event_links, $value);
        }
    }

    public function next($id)
    {
        // dd($id);
        return redirect()->route('create.event', ['id' => $id]);
    }

    public function notify($title, $desc, $icon, $method, $id)
    {
        return  $this->notification([
            'title'       => $title,
            'description' => $desc,
            'icon'        => $icon,
            'timeout'     => 2500,
            'onTimeout' => [
                'method' => $method,
                'params' => [$id],
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.new-event');
    }
}
