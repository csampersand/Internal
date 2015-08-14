<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;

use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests;
use App\Agent;
use App\Entry;
use App\Event;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $agents = Agent::all()->sortBy('name');
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAgentRequest $request
     * @return Response
     */
    public function store(AgentRequest $request)
    {
        $agent = Agent::create($request->all());
        flash()->success('Created', 'The agent as been created.');
        return redirect()->action('AgentController@show', $agent);
    }

    /**
     * Display the specified resource.
     *
     * @param  Agent  $agent
     * @return Response
     */
    public function show(Agent $agent)
    {
        $events = $agent->events->sortByDesc('date');

        // Temporary for progress bar
        $training = 0;
        foreach($events as $event) {
            if (strpos($event->name, 'Ignite') !== false) {
                $training++;
            }
        }

        return view('agents.show', compact('agent', 'events', 'training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Agent  $agent
     * @return Response
     */
    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Agent  $agent
     * @param  AgentRequest  $request
     * @return Response
     */
    public function update(Agent $agent, AgentRequest $request)
    {
        $agent->update($request->all());
        flash()->success('Updated', 'The agent has been updated.');
        return redirect()->action('AgentController@show', $agent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Agent  $agent
     * @return Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        flash()->success('Deleted', 'The agent has been deleted.');
        return redirect()->action('AgentController@index');
    }
}
