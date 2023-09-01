<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('end_date', '>', Carbon::now())->get();
        return view('landing-page', compact('events'));
    }

    public function ticket(Request $request, Event $event)
    {
        $ticket = Event::where('title', $event->title)->firstOrFail();
        return $ticket;
    }
}