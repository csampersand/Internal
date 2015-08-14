<?php

use Illuminate\Database\Seeder;
use App\Agent;

class AgentTableImport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = explode(PHP_EOL, Storage::disk('local')->get('import/agents.csv'));
        foreach($rows as $row) {
            $agent = str_getcsv($row);
            $agent[1] = str_replace(' ', '', str_replace('-', '', str_replace('(', '', str_replace(')', '', $agent[1]))));
            Agent::create([
                'name' => $agent[0],
                'phone' => $agent[1],
                'email' => $agent[2],
                'active' => true
            ]);
        }
    }
}
