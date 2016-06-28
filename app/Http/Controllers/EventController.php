<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Entry;
use App\Event;
use App\Lesson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all()->sortby('date')->reverse();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $lessons = array_merge(['Unique Event (default)'], Lesson::orderBy('id')->lists('name', 'id')->toArray());

        return view('events.create', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EventRequest $request)
    {
        $event = Event::create($request->all());

        flash()->success('Created', 'The event was created successfully.');

        return redirect()->action('EventController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        $agents = $event->agents;

        return view('events.show', compact('event', 'agents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        $lessons = array_merge(['Unique Event (default)'], Lesson::orderBy('id')->lists('name')->toArray());

        return view('events.edit', compact('event', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Event $event
     * @return Response
     */
    public function update(Event $event, EventRequest $request)
    {
        $event->update($request->all());

        flash()->success('Updated', 'The event was updated successfully.');

        return redirect()->action('EventController@show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        flash()->success('Deleted', 'The event was deleted successfully.');

        return redirect()->action('EventController@index');
    }
}
