<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class TestModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hadi';

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

        $user = User::find(1);

        dd($user);
    }
}


// This .php file is created to via php artisan make:command TestModel
// in order to use ORM to get info from database for example 
// $user = User::find(1);

  //      dd($user);
// GET the user with id=1 and display it when i run php artisan Hadi