<?php

namespace App\Http\Controllers;


use App\User;
use DateTime;
use Illuminate\Http\Request;
use Jumbojett\OpenIDConnectClient;
use GuzzleHttp\Client;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Microsoft\Graph\Model\Calendar;
use Microsoft\Graph\Model\OnlineMeeting;

class MicrosoftController extends Controller
{
    public $accesstoken;

    public function __construct()
    {
        // $tenantId = '55996817-2ba9-41db-9d14-ac65815182a8';
        
        $guzzle = new Client();
        $tenantId = 'organizations';
        $url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0';
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => 'a46a36f1-8d70-48f3-b0b7-23758e35bbc6',///$clientId,
                'client_secret' => 'XMS8Q~YlA2gvKiPIS75fnZpM1y5CLyQkFNr3ZbXo', // $clientSecret,
                'resource' => 'https://graph.microsoft.com/',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents());
        $this->accessToken = $token->access_token;

    }

    public function getCalendarData(){
        $graph = new Graph();
        $requestBody = new OnlineMeeting();
        $requestBody->setStartDateTime(new DateTime('2019-07-12T14:30:34.2444915-07:00'));
        
        $requestBody->setEndDateTime(new DateTime('2019-07-12T15:00:34.2464912-07:00'));
        
        $requestBody->setSubject('User Token Meeting');
        $graph->setBaseUrl("https://graph.microsoft.com/")
               ->setApiVersion("v1.0")
               ->setAccessToken($this->accessToken); 
        // dd($graph);
        $requestResult = $graph->createRequest("POST", '/users/AdegbulugbeTimilehin@Freelancing240.onmicrosoft.com/onlineMeetings')->addHeaders(array("Content-Type" => "application/json"))
                                        ->attachBody($requestBody)
                                        ->setReturnType(OnlineMeeting::class)
                                        ->execute();

        dd($requestResult);
        // echo "Hello, I am $user->getGivenName() ";
    }
}