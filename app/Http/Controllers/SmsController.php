<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    /**
     * Get all sms history.
     */
    public function index()
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $messages = $twilio->messages->read([], 20);

        dd($messages);
    }

    public function verifySms()
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        $twilio_number = getenv("TWILIO_NUMBER");

        $messages = $twilio->messages->read([
            "dateSent" => new \DateTime('2016-08-31T00:00:00Z'),
            "from" => $twilio_number,
            "to" => "+573217816922"
        ], 20);

        dd($messages);
    }


}
