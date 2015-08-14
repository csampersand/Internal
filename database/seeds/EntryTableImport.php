<?php

use Illuminate\Database\Seeder;
use App\Agent;
use App\Event;
use App\Entry;
use Carbon\Carbon;

class EntryTableImport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'import/old_tracker';
        foreach(Storage::disk('local')->files($directory) as $file) {
            $filecontent = Storage::disk('local')->get($file);
            $rows = explode("\r\n", $filecontent);
            foreach($rows as $row) {
                $columns = explode(",", $row);
                $array[] = $columns;
            }

            $month = ltrim(rtrim($file, '.csv'), $directory);
            $names = $array[0];
            $dates = $array[1];
            for($i = 2; $i < count($array); $i++) {
                if ($array[$i][0] === "ASSISTANTS") {
                    break;
                }

                if ($array[$i][0] && !($agent = Agent::where('name', $array[$i][0])->first())) {
                    $agent = Agent::create([
                        'name' => $array[$i][0],
                        'email' => $array[$i][0],
                        'active' => false
                    ]);
                }

                for($j = 1; $j < count($array[$i]); $j++) {
                    if($array[$i][$j]) {
                        if ($event = Event::where('name', $names[$j])->where('date', Carbon::parse($month . ' ' . $dates[$j])->toDateString())->first()) {
                            Entry::create([
                                'agent_id' => $agent->id,
                                'event_id' => $event->id
                            ]);
                        }
                    }
                }
            }
            unset($array);
        }
    }
}
