<?php

use App\Agent;
use App\Entry;
use Illuminate\Database\Seeder;

class EntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Agent::all() as $agent) {
            if (rand(0, 1)) {
                Entry::create(['event_id' => 1, 'agent_id' => $agent->id]);
            }
            Entry::create(['event_id' => rand(2,3), 'agent_id' => $agent->id]);
        }
    }
}
