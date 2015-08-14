<?php

use Illuminate\Database\Seeder;
use App\Event;
use Carbon\Carbon;

class EventTableImport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directory = 'import/old_tracker/';
        $files = Storage::disk('local')->files($directory);
        foreach($files as $file) {
            
            $rows = explode("\r\n", Storage::disk('local')->get($file));
            unset($table);
            foreach($rows as $row) {
                $table[] = explode(",", $row);
            }

            $month = ltrim(rtrim($file, '.csv'), $directory);
            $names = $table[0];
            $dates = $table[1];
            for($i = 0, $len = (count($names) - 1); $i <= $len; $i++) {
                if(isset($names[$i]) && isset($dates[$i]) && $dates[$i] > 0) {
                    Event::create([
                        'name' => $names[$i],
                        'date' => Carbon::parse($month . " " . $dates[$i])
                    ]);
                }
            }
        }
    }
}
