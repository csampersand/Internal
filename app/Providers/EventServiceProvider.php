<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Lesson;
use App\Course;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Lesson::deleting(function($lesson)
        {
            foreach($lesson->events as $event)
            {
                $event->update(['lesson_id' => 0]);
            }
        });

        Course::deleting(function($course) {
            foreach($course->lessons as $lesson)
            {
                $lesson->update(['course_id' => 0]);
            }
        });

    }
}
