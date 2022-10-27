<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SlackNotification;
use Notification;

class SlackController extends Controller
{
    public function index()
    {
    Notification::route('slack', env('SLACK_WEBHOOK'))->notify(new SlackNotification());
        // $aktivitas = Aktivitas::first();
        // $aktivitas->notify(new SlackNotification());
    }
}
