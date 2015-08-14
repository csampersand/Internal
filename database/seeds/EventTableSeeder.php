<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'IGNITE: Rev Up!',
            'date' => \Carbon\Carbon::parse(rand(1, 7) . ' days')
        ]);
        Event::create([
            'name' => 'Team Meeting',
            'date' => \Carbon\Carbon::parse(rand(1, 7) . ' days')
        ]);
        Event::create([
            'name' => 'KW Classic Office Orientation',
            'date' => \Carbon\Carbon::parse(rand(1, 7) . ' days')
        ]);
    }
}
