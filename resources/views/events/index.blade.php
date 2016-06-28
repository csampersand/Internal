@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1><i class="fa fa-fw fa-calendar"></i> Events</h1>

            <div class="btn-toolbar" role="toolbar" aria-label="...">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="{{ action('EventController@create') }}" class="btn btn-primary"><i class="fa fa-fw fa-calendar-plus-o"></i> New Event</a>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Attendees</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($events) > 0)
                    @foreach($events as $event)
                        <tr>
                            <td><a href="{{ action('EventController@show', $event->id) }}">{{ $event->name }}</a></td>
                            <td>{{ count($event->agents) }}</td>
                            <td>{{ $event->date->format('M j, Y') }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection