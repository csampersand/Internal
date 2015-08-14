<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateEntryRequest;
use App\Http\Controllers\Controller;
use App\Entry;
use App\Agent;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $page
     * @return Response
     */
    public function index($page)
    {

        // Results per page
        $count = 15;

        // Entries for the current page
        $entries = Entry::page($page, $count)->get();

        // Last page
        $last = ceil(Entry::count() / $count);

        // Number of tabs in pagination
        $tabs = 9;

        if($page < 1) return redirect()->action('EntryController@index', 1);
        if($page > $last + 1) return redirect()->action('EntryController@index', $last);

        if ($last < $tabs)
        {
            $tabs = $last;
            $pagination[0] = 1;
        }
        elseif ($page + (($tabs - 1) / 2) > $last)
        {
            $pagination[0] = intval($last - ($tabs - 1));
        }
        elseif ($page - (($tabs - 1) / 2) < 1)
        {
            $pagination[0] = 1;
        }
        else
        {
            $pagination[0] = $page - (($tabs - 1) / 2);
        }
        for($i = 1; $i < $tabs; $i++)
        {
            $pagination[] = $pagination[0] + $i;
        }

        return view('entries.index', compact('entries', 'page', 'last', 'pagination'));
    }

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

        // Prevent duplicate entries
        if (!Entry::where('event_id', $id)->where('agent_id', $agent->id)->exists()) {
            $entry = new Entry(['event_id' => $id]);
            $agent->entries()->save($entry);
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
