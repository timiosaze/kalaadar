<?php

use App\Http\Controllers\BookingEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\microsoftapi;
use App\Http\Controllers\MicrosoftController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
use App\Models\BookingEvent;
use App\Models\Event as AppEvent;
use App\Models\Schedule;
use App\Models\SubscriptionCreated;
use App\PulkitJalan\Client;
use Carbon\Carbon;
use Google\Service\Calendar;
use Google\Service\Calendar\ConferenceData;
use Google\Service\Calendar\CreateConferenceRequest;
use Google\Service\Calendar\Event;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\Event as MicrosoftEvent;
use Microsoft\Graph\Model\OnlineMeeting;
use PulkitJalan\Google\Facades\Google;
use Sebbmyr\LaravelTeams\Cards\CustomCard;
use Sebbmyr\Teams\Cards\Adaptive\BaseAdaptiveCard;
use Sebbmyr\Teams\TeamsConnector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/oauth2callback.php', function(Request $request){
    // $value = $request->session()->get('calendarEvent');
    // dd(session('calendarEvent'));
    $state = request()->get('state');    // GET['state'];
    $state = base64_decode(strtr($state, '-_,', '+/='));
    // dd($state); 
    $option = explode(" ", $state)[1];
    if($option == 'google'){
        $id = explode(" ", $state)[0];
        // dd($id);
    }
    $the_event = AppEvent::find($id); 
    $start_time =  $the_event->booking->booking_date . ' ' .  $the_event->booking->start_time;
    $end_time = $the_event->booking->booking_date . ' ' . $the_event->booking->end_time;
    // dd($this->start_time);
    $summary = $the_event->eventname;
    $description = $the_event->description;
    $location = $the_event->bookingdetail->location;
    $timezone = $the_event->bookingevent->timezone;
    $event_creator_email = $the_event->user->email;
    $booker_email = $the_event->bookingdetail->email;

        // dd(Carbon::createFromFormat('Y-m-d H:i',$start_time), Carbon::now(), Carbon::createFromFormat('Y-m-d H:i', $end_time), Carbon::now()->addHour());
        // $calendarEvent = session('calendarEvent');
        // dd($calendarEvent);
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
    $email = 'timiade1993@gmail.com';

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
    $uuid = Str::uuid();
    $url = "http:://127.0.0.1:8000/schedules/".$uuid."/";
    // $event = new Event(array(
    //     'summary' => 'Google I/O 2015',
    //     'location' => '800 Howard St., San Francisco, CA 94103',
    //     'description' => "A chance to hear more about Google\'s developer products. $url",
    //     'start' => array(
    //     'dateTime' => Carbon::now(),
    //     'timeZone' => 'America/Los_Angeles',
    //     ),
    //     'end' => array(
    //     'dateTime' => Carbon::now()->addHour(),
    //     'timeZone' => 'America/Los_Angeles',
    //     ),
    //     'recurrence' => array(
    //     'RRULE:FREQ=DAILY;COUNT=1'
    //     ),
    //     'attendees' => array(
    //     array('email' => 'lpage@example.com'),
    //     array('email' => 'sbrin@example.com'),
    //     ),
    //     'reminders' => array(
    //     'useDefault' => FALSE,
    //     'overrides' => array(
    //         array('method' => 'email', 'minutes' => 24 * 60),
    //         array('method' => 'popup', 'minutes' => 10),
    //     ),
    //     ),
    // ));
    $event = new Event(array(
        'summary' => $summary, 
        'location' => $location, 
        'description' => $description . ' ' . $url, 
        'start' => array(
        'dateTime' => Carbon::createFromFormat('Y-m-d H:i',$start_time), 
        'timeZone' => $timezone, 
        ),
        'end' => array(
        'dateTime' => Carbon::createFromFormat('Y-m-d H:i', $end_time), 
        'timeZone' => $timezone, 
        ),
        'recurrence' => array(
        'RRULE:FREQ=DAILY;COUNT=1'
        ),
        'sendUpdates' => 'all',
        'attendees' => array(
        array('email' => $event_creator_email), 
        array('email' => $booker_email), 
        ),
        'reminders' => array(
            'useDefault' => FALSE,
            'overrides' => array(
                array('method' => 'email', 'minutes' => 24 * 60),
                array('method' => 'popup', 'minutes' => 10),
            ),
        ),
    ));
    
    $calendarId = 'primary';
    $event = $service->events->insert($calendarId, $event);

    $conference = new ConferenceData();
    $conferenceRequest = new CreateConferenceRequest();
    $conferenceRequest->setRequestId('randomString123');
    $conference->setCreateRequest($conferenceRequest);
    $event->setConferenceData($conference);

    $event = $service->events->patch($calendarId, $event->id, $event, ['conferenceDataVersion' => 1]);
    $schedule = new Schedule();
    $schedule->uuid = $uuid;
    $schedule->link = $event->hangoutLink;
    $schedule->name = $location;
    $schedule->user_id = Auth::id();
    $schedule->event_id = 5;
    $schedule->save();
    dd($event);
});
Route::get('/test', function(){
    dd(Carbon::now());
    $dt = Carbon::createFromFormat('Y-m-d H:i', '2023-5-7 08:30');
    $dt_2 = $dt->addMinutes(45);
    // echo $dt;
    // $event = AppEvent::find(5);
    // dd($event);
    // return redirect()->route('google.create', ['event' => $event]);
});
Route::get('/schedules/{uuid}/', function($uuid){
    $schedule = Schedule::where('uuid', $uuid)->first();
    // dd($schedule->link);
    return redirect()->away($schedule->link);
});

Route::get('/client/{event}/{option}', function(AppEvent $event, $option){

    if($option == 'google'){
        $param = $event->id . ' ' . $option;
    }

    if($option == 'zoom'){
        $arr = urldecode($event);
        $arr = explode(' ', $arr);
        $param = implode($arr) . ' ' . $option; 
    }

    // dd($param);
       

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
    
    $params = strtr(base64_encode($param), '+/=', '-_,');
    $client->setState($params);

    $client->setIncludeGrantedScopes(true);
    $email = 'timiade1993@gmail.com';

    $client->setLoginHint($email);
    // $client->setApprovalPrompt('consent');
 
    $auth_url = $client->createAuthUrl();
    // dd(filter_var($auth_url, FILTER_SANITIZE_URL) . "&event_id=$event->id");
    return redirect(filter_var($auth_url, FILTER_SANITIZE_URL));
    
})->where('event', '.*')->name('google.create');

// Route::get('/oauth2callback.php', [GoogleController::class, 'oauth'])->name('google.oauth');
// Route::get('/client/{arr}', [GoogleController::class, 'client'])->where('arr', '.*')->name('google.zoom.create');

Route::get('/microsoft', function() {
    $authUrl = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
    
    $query   = http_build_query([
        'client_id'     => config('services.microsoft.client_id'),
        'client_secret' => config('services.microsoft.client_secret'),
        'response_type' => 'code',
        'redirect_uri'  => secure_url('/login-redirect'),
        'scope'         => 'User.Read Team.ReadBasic.All Channel.ReadBasic.All offline_access'
    ]);

    return redirect()->away($authUrl . '?' . $query);
});
Route::get('login-redirect', function (\Illuminate\Http\Request $request) {
    $authReponse = \Illuminate\Support\Facades\Http::asForm()->post('https://login.microsoftonline.com/common/oauth2/v2.0/token', [
        'client_id'     => config('services.microsoft.client_id'),
        'client_secret' => config('services.microsoft.client_secret'),
        'code'          => $request->input('code'),
        'grant_type'    => 'authorization_code',
        'redirect_uri'  => secure_url('/login-redirect')
    ]);

    $accessToken = $authReponse['access_token'];

    $myFirstTeam     = \Illuminate\Support\Facades\Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/me/joinedTeams')['value'];
    // dd($myFirstTeam['id']);
    return [
        'id'          => $myFirstTeam[0]['id'],
        'name'        => $myFirstTeam[0]['displayName'],
        'description' => $myFirstTeam[0]['description'],
        'channels'    => \Illuminate\Support\Facades\Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/teams/' . $myFirstTeam[0]['id'] . '/channels')['value']
    ];
})->name('login.redirect');

Route::get('/countries', function () {
    $lines = file('files/countries.txt', FILE_IGNORE_NEW_LINES);
    dd($lines);
});
// Route::view('/test', 'login');
Route::view('/test2', 'register');
Route::view('/test3', 'reset-password');
Route::view('/test4', 'verify-account');
Route::view('/test5', 'kalaadar.new_appointment')->middleware(['auth', 'verified']);
Route::view('/test6', 'kalaadar.dashboard2');
Route::view('/test7', 'kalaadar.dashboard3');
Route::view('/test8', 'kalaadar.dashboard4');
Route::view('/test9', 'kalaadar.integrations');
Route::view('/test10', 'kalaadar.book_appointment');
Route::view('/test11', 'kalaadar.book_appointment2');
Route::view('/test12', 'kalaadar.payment');
Route::view('/test13', 'kalaadar.events');
Route::view('/test14', 'kalaadar.event')->middleware(['auth', 'verified']);

Route::get('/meetings/{event}', [MeetingController::class, 'create'])->name('zoom.create');


Route::controller(StripeController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
Route::get('/success', [StripeController::class, 'success'])->name('stripe_success');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('user.events');
    Route::get('/events/new', [EventController::class, 'create'])->name('new.event');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('create.event');
});

Route::get('/testing', [UserController::class, 'test']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');



Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/{user_name_slug}/{link}', [BookingEventController::class, 'show'])->name('create.bookings');
});

