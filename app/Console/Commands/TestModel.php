<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Support\Str;

class TestModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hadi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'X7 test command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $user = User::create([
        //     'name'=> 'Hadi AD',
        //     'email'=> 'hadi.aboudargham@mubs.edu.lb',
        //     'password'=> bcrypt('12345'),
        // ]);

        // dd($user);

        // $user = User::find(2);

        // $user = User::create([
        //   'name' => 'user2',
        //   'email' => 'user@example.com',
        //   'password' => bcrypt('55555'),
        // ]);

        // $event = Event::create([           CREATE EVENT 
        //     'title' => 'Sample Event',
        //     'description' => 'This is a sample event description.',
        //     'location' => 'Sample Location',
        //     'start_date' => '2024-07-01 10:00:00',
        //     'end_date' => '2024-07-01 18:00:00',
        //     'price' => 50.00,
        //     'total_tickets' => 100,
        //     'available_tickets' => 100,
        //     'image' => 'sample-event.jpg',
        //     'category' => 'Conference',
        //     'status' => 'active',
        //     'organizer_id' => 1,
        // ]);

        // $event = new Event();        CREATE EVENT BAD METHOD
        // $event->title = 'Xpertbot Event';
        // $event->description = 'Description for xpertbot event.';
        // $event->location = 'Online';
        // $event->start_date = '2025-08-01 11:00:00';
        // $event->end_date = '2025-08-01 17:00:00';
        // $event->price = 10.00;
        // $event->total_tickets = 200;
        // $event->available_tickets = 200;
        // $event->image = 'xpertbot-event.jpg';
        // $event->category = 'Webinar';
        // $event->status = 'active'; 
        // $event->organizer_id = 2;
        // $event->save();

        // $event = Event::all();
        // $event = Event::findOrFail(3);
        // $event = Event::where('category', 'Conference')->get();
        // dd($event->toArray());

        // $event_more_than_20 = Event::where('price', '>', 20)->get();
        // dd($event_more_than_20->toArray());

        // $event_price_50 = Event::wherePrice(50)->get();
        // dd($event_price_50->toArray());


        // $event = Event::create([
        //   'title' => 'Open day',
        //   'description' => 'This is open day event',
        //   'location' => 'MUBS',
        //   'start_date' => '2026-01-01 09:00:00',
        //   'end_date' => '2026-01-03 12:00:00',
        //   'price' => 50.00,
        //   'total_tickets' => 100,
        //   'available_tickets' => 200,
        //   'image' => 'open-day.jpg',
        //   'category' => 'Educational',
        //   'status' => 'active',
        //   'organizer_id' => 1,
        // ]);
        // dd("done");

        // THIS IS: select from events where price = 50 and available_tickets > 100
        // $event = Event::where('price', 50)->where('available_tickets', '>', 100)->get();
        // dd($event->toArray());

        // $event = Event::where('price', 50)->get()->first(); 
        // dd($event->toArray());

        // $event = Event::find(3);   UPDATE EVENT available tickets using ORM
        // $event->available_tickets = 500;
        // $event->save();
        // dd("updated");

        // $event = Event::where('id', '3')->update([
        //   'available_tickets' => 300,
        //   'price' => 75.00
        // ]);

        // $event = EVent::find(3);
        // $event->delete();
        // dd("deleted");
        

        // $user = User::find(2);         FIND EVENTS FOR USER WITH ID=2
        // dd($user->events->toArray());

        // $event = Event::find(4);         Find ORGANIZER FOR EVENT WITH ID=4
        // dd($event->organizer->toArray());

        // $user = User::find(2);         // To automatically set the organizer_id when creating an event 
        // $event = $user->events()->create([
        //   'title'=>'Laravel Conference',
        //   'description'=>'A conference about Laravel framework.',
        //   'location'=>'New York',
        //   'start_date'=>'2024-09-15 09:00:00',
        //   'end_date'=>'2024-09-15 17:00:00',
        //   'price'=>100.00,
        //   'total_tickets'=>150,
        //   'available_tickets'=>150,
        //   'image'=>'laravel-conference.jpg',
        //   'category'=>'Technology',
        //   'status'=>'active',
        // ]);
        // dd($event->toArray());

        // $event = Event::find(5);
        // $bookings = $event->bookings()->create([
        //   'user_id' => 2,
        //   'quantity' => 2,
        //   'total_amount' => 200.00,
        //   'booking_reference' => 'REF123456',
        //   'status' => 'confirmed',
        // ]);
        // dd($bookings->toArray());

        // $user = User::find(2);         // Get all bookings for user with id=2
        // dd($user->bookings->toArray());

        // $user = User::with('bookings.event')->find(2); // Eager load bookings and associated events for user with id=2
        // dd($user->toArray());
    
        // $booking = Booking::all();
        // dd($booking->toArray());
    
        // $attendees = User::whereHas('bookings')->get();
        // dd($attendees->toArray());
    


        // Create a new user who will be an attendee

        // $user = User::create([
        //   'name'=> 'Attendee User',
        //   'email'=> 'attendee@gmail.com',
        //   'password'=> bcrypt('attendee123'),
        // ]);
    
        // $user = User::find(3);         // Create a booking for user with id=3 for event with id=4
        // $booking = $user->bookings()->create([
        //   'event_id' => 4,
        //   'quantity' => 4,
        //   'total_amount' => 200.00,
        //   'booking_reference' => 'REF654321',
        //   'status' => 'confirmed',
        // ]);
        // dd($booking->toArray());

        // $user = User::find(3);         // Create another booking for user with id=3 for event with id=5 
        // $booking = $user->bookings()->create([
        //   'event_id' => 5,
        //   'quantity' => 3,
        //   'total_amount' => 300.00,
        //   'booking_reference' => 'REF789012',
        //   'status' => 'pending',
        // ]);
        // dd($user->bookings->toArray());

        // $user = User::find(3)->bookings()->with('event')->get(); // Get all bookings for user with id=3 along with event details
        // dd($user->toArray());

        // End of new attendee and bookings creation

    
        // $booking = Booking::find(3)->update(['user_id'=>'1']); // Update booking with id=3 to change the user_id to 1
        // dd("booking updated");

        // $event = Event::with('bookings.user')->find(4); // Get event with id=4 along with all bookings and user details
        // dd($event->toArray());
        
        // $user = User::find(2)->events()->with('bookings')->get(); // Get all events organized by user with id=2 along with their bookings
        // dd($user->toArray());
        
        // $user = User::find(2)->bookings()->get();
        // dd($user->toArray());

        // $events = Event::where('available_tickets', '>', '170')->increment('available_tickets', 20); // Increment available_tickets by 20 for events with more than 170 available tickets
        // dd("updated");

        // $user = User::doesntHave('bookings')->get(); // Get all users who have not made any bookings
        // dd($user->toArray());


        //GET ALL USERS AND DISPLAY THEIR BOOKING COUNT
        $users=User::with('bookings')->get(); // Get all users along with their bookings
        foreach ($users as $user) {
            $bookingcount = $user->bookings->count();
            echo $user->name . " has " . $bookingcount . " " . Str::plural('booking', $bookingcount) . ".\n";
        } 


      }
}


// This .php file is created via php artisan make:command TestModel
// in order to use ORM to get info from database for example 
// $user = User::find(1);

  //      dd($user);
// GET the user with id=1 and display it when i run php artisan Hadi