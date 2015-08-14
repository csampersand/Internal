<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('agent_event', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->integer('agent_id')->unsigned()->index();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agent_event', function(Blueprint $table) {
            $table->dropForeign('agent_event_agent_id_foreign');
            $table->dropForeign('agent_event_event_id_foreign');
        });
        Schema::drop('agents');
    }
}
