<?php

namespace App\Http\Controllers;

use App\Models\Event as AppEvent;
use App\Models\Schedule;
use Carbon\Carbon;
use Google\Service\Calendar;
use Google\Service\Calendar\ConferenceData;
use Google\Service\Calendar\CreateConferenceRequest;
use Google\Service\Calendar\Event;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    //
    // private $event;
    private $summary;
    private $location;
    private $description;
    public $start_time;
    public $end_time;
    private $timezone;
    private $event_creator_email;
    private $booker_email;

    public function oauth(){
        $state = request()->get('state');    // GET['state'];
        $state = base64_decode(strtr($state, '-_,', '+/='));
        $id=$state;
        $the_event = AppEvent::find($id); 
        $this->start_time =  $the_event->booking->booking_date . ' ' .  $the_event->booking->start_time;
        $this->end_time = $the_event->booking->booking_date . ' ' . $the_event->booking->end_time;
        // dd($this->start_time);
        $this->summary = $the_event->eventname;
        $this->description = $the_event->description;
        $this->location = $the_event->bookingdetail->location;
        $this->timezone = $the_event->bookingevent->timezone;
        $this->event_creator_email = $the_event->user->email;
        $this->booker_email = $the_event->bookingdetail->email;
        // dd($this->start_time, $this->end_time, $this->summary, $this->description, $this->location, $this->timezone, $this->event_creator_email, $this->booker_email);
        $client = new Google_Client();
        $client->setAuthConfig(public_path('files/client_secret_68036643521-8ujgf4t0pndql4usb2qneori0ftg1htn.apps.googleusercontent.com.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setRedirectUri('http://127.0.0.1:8000/oauth2callback.php');
        // offline access will give you both an access and refresh token so that
        // your app can refresh the access token without user interaction.
        $client->setAccessType('offline');
        // Using "consent" ensures that your application always receives a refresh token.
        // If you are not using offline access, you can omit this.
        $client->setPrompt('consent');
    
        $client->setIncludeGrantedScopes(true);
        $email = Auth::user()->email;
    
        $client->setLoginHint($email);
        // $client->setApprovalPrompt('consent');
     
        // $auth_url = $client->createAuthUrl();
        // dd(filter_var($auth_url, FILTER_SANITIZE_URL));
        // return redirect(filter_var($auth_url, FILTER_SANITIZE_URL));
        $client->authenticate($_GET['code']);
        $access_token = $client->getAccessToken();
        // dd($access_token);
        $client->setAccessToken($access_token);
        // Refer to the PHP quickstart on how to setup the environment:
    // https://developers.google.com/calendar/quickstart/php
    // Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
    // credentials.
        $service = new Calendar($client);
        $calendarList = $service->calendarList->listCalendarList();
    
        // while(true) {
        //   foreach ($calendarList->getItems() as $calendarListEntry) {
        //     dd($calendarListEntry->getSummary());
        //   }
        //   $pageToken = $calendarList->getNextPageToken();
        //   if ($pageToken) {
        //     $optParams = array('pageToken' => $pageToken);
        //     $calendarList = $service->calendarList->listCalendarList($optParams);
        //   } else {
        //     break;
        //   }
        // }
        // dd($this->start_time);
        $uuid = Str::uuid();
        $url = "http:://127.0.0.1:8000/schedules/".$uuid."/";
        $event = new Event(array(
            'summary' => $this->summary, #topic
            'location' => $this->location, #location
            'description' => $this->description . ' ' . $url, #description
            'start' => array(
            'dateTime' => Carbon::createFromFormat('Y-m-d H:i',$this->start_time), #datetime
            'timeZone' => $this->timezone, #timezone
            ),
            'end' => array(
            'dateTime' => Carbon::createFromFormat('Y-m-d H:i', $this->end_time), #added time like 30 mins
            'timeZone' => $this->timezone, #timezone
            ),
            'recurrence' => array(
            'RRULE:FREQ=DAILY;COUNT=1'
            ),
            'attendees' => array(
            array('email' => $this->event_creator_email), #event_creator email
            array('email' => $this->booker_email), #booker email
            ),
            'reminders' => array(
            'useDefault' => FALSE,
            'overrides' => array(
                array('method' => 'email', 'minutes' => 24 * 60),
                array('method' => 'popup', 'minutes' => 10),
            ),
            ),
        ));
        // dd($event);
        $calendarId = $email;
        // dd($calendarId);
        // $event = $service->events->insert($calendarId, $event);

        // $conference = new ConferenceData();
        // $conferenceRequest = new CreateConferenceRequest();
        // $conferenceRequest->setRequestId('randomString123');
        // $conference->setCreateRequest($conferenceRequest);
        // $event->setConferenceData($conference);

        // $event = $service->events->patch($calendarId, $event->id, $event, ['conferenceDataVersion' => 1]);
        dd($event);
    }
    public function client($arr)
    {
        // $arr = urldecode($arr);
        // $arr = explode(' ', $arr);
        // dd($arr);
       
        $client = new Google_Client();
        $client->setAuthConfig(public_path('files/client_secret_68036643521-8ujgf4t0pndql4usb2qneori0ftg1htn.apps.googleusercontent.com.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setRedirectUri('http://127.0.0.1:8000/oauth2callback.php');
        // offline access will give you both an access and refresh token so that
        // your app can refresh the access token without user interaction.
        $client->setAccessType('offline');
        // Using "consent" ensures that your application always receives a refresh token.
        // If you are not using offline access, you can omit this.
        $client->setPrompt('consent');
        $params = strtr(base64_encode($arr), '+/=', '-_,');
        $client->setState($params);
        // $client->setSubject('account@domain.com');
        $client->setIncludeGrantedScopes(true);
        $email = Auth::user()->email;
    
        $client->setLoginHint($email);
        // $client->setApprovalPrompt('consent');
    
        $auth_url = $client->createAuthUrl();
        // dd($auth_url);
        // dd(filter_var($auth_url, FILTER_SANITIZE_URL));
        return redirect(filter_var($auth_url, FILTER_SANITIZE_URL));
        // return redirect()->route('google.create', ['id' => 1]);
    }

        
}
