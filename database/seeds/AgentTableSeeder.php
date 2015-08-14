<?php

use App\Agent;
use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::create(['name' => 'Jessica Hide', 'email' => 'redacted', 'phone' => 'redacted', 'active' => false]);
        Agent::create(['name' => 'Paul Blart', 'email' => 'mallcop43@msn.com', 'phone' => '4077774444', 'active' => false]);
        Agent::create(['name' => 'Christine Anderson', 'email' => 'christine@csanderson.me', 'phone' => '4076254912', 'active' => false]);
        Agent::create(['name' => 'Seth Heard', 'email' => 'pendragonseth@gmail.com', 'phone' => '4073849275', 'active' => false]);
        Agent::create(['name' => 'Nadine Hatfield', 'email' => 'nhatfield1@gmail.com', 'phone' => '4078435724', 'active' => false]);
        Agent::create(['name' => 'Dom Mazetti', 'email' => 'dom@dom.com', 'phone' => '9784627482', 'active' => false]);
        Agent::create(['name' => 'Quentin Tarantino', 'email' => 'qtpie@gmail.com', 'phone' => '3842838482', 'active' => false]);
        Agent::create(['name' => 'John Smith', 'email' => 'jsmith@gmail.com', 'phone' => '3847265738', 'active' => false]);
    }
}
