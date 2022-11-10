<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\microsoftapi;
use App\Http\Controllers\MicrosoftController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
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
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
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

Route::get('/oauth2callback.php', function(){
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
    $client->setLoginHint('timiade1993@gmail.com');
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
    $event = new Event(array(
        'summary' => 'Google I/O 2015',
        'location' => '800 Howard St., San Francisco, CA 94103',
        'description' => 'A chance to hear more about Google\'s developer products.',
        'start' => array(
        'dateTime' => Carbon::now(),
        'timeZone' => 'America/Los_Angeles',
        ),
        'end' => array(
        'dateTime' => Carbon::now()->addHour(),
        'timeZone' => 'America/Los_Angeles',
        ),
        'recurrence' => array(
        'RRULE:FREQ=DAILY;COUNT=2'
        ),
        'attendees' => array(
        array('email' => 'lpage@example.com'),
        array('email' => 'sbrin@example.com'),
        ),
        'reminders' => array(
        'useDefault' => FALSE,
        'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
        ),
        ),
    ));
    
    $calendarId = 'timiade1993@gmail.com';
    $event = $service->events->insert($calendarId, $event);

    $conference = new ConferenceData();
    $conferenceRequest = new CreateConferenceRequest();
    $conferenceRequest->setRequestId('randomString123');
    $conference->setCreateRequest($conferenceRequest);
    $event->setConferenceData($conference);

    $event = $service->events->patch($calendarId, $event->id, $event, ['conferenceDataVersion' => 1]);
    dd($event);
});
Route::get('/client', function () {
    
    $client = new Google_Client();
    $client->setAuthConfig(public_path('files/client_secret_68036643521-8ujgf4t0pndql4usb2qneori0ftg1htn.apps.googleusercontent.com.json'));
    $client->addScope(Calendar::CALENDAR);
    $client->setRedirectUri('https://kalaadar.test/oauth2callback.php');
    // offline access will give you both an access and refresh token so that
    // your app can refresh the access token without user interaction.
    $client->setAccessType('offline');
    // Using "consent" ensures that your application always receives a refresh token.
    // If you are not using offline access, you can omit this.
    $client->setPrompt('consent');

    $client->setIncludeGrantedScopes(true);
    $client->setLoginHint('timiade1993@gmail.com');
    // $client->setApprovalPrompt('consent');
 
    $auth_url = $client->createAuthUrl();
    // dd(filter_var($auth_url, FILTER_SANITIZE_URL));
    return redirect(filter_var($auth_url, FILTER_SANITIZE_URL));
    
});



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

    $myFirstTeam     = \Illuminate\Support\Facades\Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/me/joinedTeams')['value'][0];
    return [
        'id'          => $myFirstTeam['id'],
        'name'        => $myFirstTeam['displayName'],
        'description' => $myFirstTeam['description'],
        'channels'    => \Illuminate\Support\Facades\Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/teams/' . $myFirstTeam['id'] . '/channels')['value']
    ];
})->name('login.redirect');

Route::get('/countries', function () {
    $lines = file('files/countries.txt', FILE_IGNORE_NEW_LINES);
    dd($lines);
});
Route::view('/test', 'login');
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

Route::controller(StripeController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
Route::get('/success', [StripeController::class, 'success'])->name('stripe_success');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/appointment', [UserController::class, 'new_appointment'])->name('new_appointment');
    Route::get('/integrations', [UserController::class, 'integrations'])->name('integrations');
    Route::get('/account', [UserController::class, 'account'])->name('account');
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

