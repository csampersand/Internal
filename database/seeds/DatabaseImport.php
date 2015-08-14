<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Agent;
use App\Entry;

class DatabaseImport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(EventTableImport::class);
        // $this->call(AgentTableImport::class);
        // $this->call(EntryTableImport::class);

        $database = json_decode(Storage::disk('local')->get('export.json'), true);

        foreach($database['events'] as $event) {
            Event::create([
                'id' => $event['id'],
                'name' => $event['name'],
                'date' => $event['date'],
                'lesson_id' => ($event['type'] > 0 ? $event['type'] : 0)
            ]);
        }
        foreach($database['agents'] as $agent) {
            Agent::create([
                'id' => $agent['id'],
                'name' => $agent['name'],
                'email' => $agent['email'],
                'phone' => $agent['phone'],
                'active' => $agent['active']
            ]);
        }
        foreach($database['entries'] as $entry) {
            Agent::find($entry['agent_id'])->events()->attach($entry['event_id']);
        }


        Model::reguard();
    }
}
