<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(AgentTableSeeder::class);
        $this->call(EntryTableSeeder::class);

        Model::reguard();
    }
}
