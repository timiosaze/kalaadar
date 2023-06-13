<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;
    
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request) { 
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function ( $m ) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
            return $m;
        }, $data['meetings']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }
    public function create(Event $event) {
        // dd($event);
       
        $summary = $event->eventname;
        $description = $event->description;
        $schedule_for = $event->bookingdetail->email;
        $duration = $event->bookingevent->duration;
        $timezone = $event->bookingevent->timezone;
        $start_time = $event->booking->start_time;


        // $data = Session::get('data');
        // dd($data);
        // $validator = Validator::make($request->all(), [
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'agenda' => 'string|nullable',
        // ]);
        
        // if ($validator->fails()) {
        //     return [
        //         'success' => false,
        //         'data' => $validator->errors(),
        //     ];
        // }
        // $data = $validator->validated();
    
        $path = 'users/me/meetings';
        // $response = $this->zoomPost($path, [
        //     'topic' => $data['topic'],
        //     'type' => self::MEETING_TYPE_SCHEDULE,
        //     'start_time' => $this->toZoomTimeFormat($data['start_time']),
        //     'duration' => $data['duration'],
        //     'timezone' => $data['timezone'],
        //     'agenda' => 'Kalaadar',
        //     'settings' => [
        //         'host_video' => true,
        //         'participant_video' => true,
        //         'waiting_room' => true,
        //     ]
        // ]);
    
        $response = $this->zoomPost($path, [
            'topic' => $summary,
            "schedule_for" => $schedule_for,
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($start_time),
            'duration' => $duration,
            'timezone' => $timezone,
            'agenda' => $description,
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'waiting_room' => true,
            ]
        ]);

        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
        $data = json_decode($response->body(), true);
        $event = $data['join_url'] . ' ' . $data['password'];
        // return implode('&', $arr);
        return redirect()->route('google.create', ['event' => urlencode($event), 'option' => 'zoom']);

    }
    public function get(Request $request, string $id) { 

        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
            
    }
    public function update(Request $request, string $id) { 
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);
    
        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();
    
        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
    
        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    /**/
    }
    public function delete(Request $request, string $id) { 
        
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }
}
