<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\HTTP\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('events', function () {
//     $events = Event::with(['organizer','bookings.user'])->get();
//     return response()->json($events);
//     // return view('events', compact('events'));
// });


// Route::get('/events/{id}', function ($id) {
//     return "Event ID: " . $id; // simple test, no controller needed
// });

Route::get('events', [EventController::class, 'index']);

Route::get('events/{id}', [EventController::class, 'show']);


Route::resource('events', EventController::class);