<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateEntryRequest;
use App\Http\Controllers\Controller;
use App\Event;
use App\Agent;

class EntryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $event = Event::findOrFail($id);

        return view('entries.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id, CreateEntryRequest $request)
    {
        $agent = Agent::where('name', $request->input('name'))->first();
        $event = Event::find($id);

        // Prevent duplicate entries
        // if (!Entry::where('event_id', $id)->where('agent_id', $agent->id)->exists()) {
        if (!$event->agents()->where('agent_id', $agent->id)->exists()) {
            // $entry = new Entry(['event_id' => $id]);
            $event->agents()->save($agent);
        }

        return redirect(action('EventController@show', $id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
