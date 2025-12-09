<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function index() {
        $events = Event::with(['organizer','bookings.user'])->get();
        return view('events', compact('events'));
    }

    function show($id) {
        $event = Event::with(['organizer','bookings.user'])->findOrFail($id);
        return view('event_detail', compact('event'));
    }
}   
