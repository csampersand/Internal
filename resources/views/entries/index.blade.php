@extends('app')
@section('content')
<div class="panel panel-default" style="margin-top:15px">
    <div class="panel-heading">
        <h3 class="panel-title">Event Roster Entries</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Agent</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @if(count($entries) > 0)
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td><a href="{{ action('EventController@show', [$entry->event->id]) }}">{{ $entry->event->name }}</a></td>
                    <td><a href="{{ action('AgentController@show', [$entry->agent->id]) }}">{{ $entry->agent->name }}</a></td>
                    <td>{{ $entry->created_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<nav style="text-align: center;">
    <ul class="pagination">
        <li {!! ($page <= 1 ? 'class="disabled"' : '') !!}>
            <a {!! ($page <= 1 ? '' : 'href="'.action('EntryController@index', 1).'"') !!} aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @foreach($pagination as $number)
        <li {!! ($number == $page ? 'class="active"' : '') !!}><a href="{!! ($number == $page ? '#' : action('EntryController@index', $number)) !!}">{{ $number }}</a></li>
        @endforeach
        <li {!! ($page >= $last ? 'class="disabled"' : '') !!}>
            <a {!! ($page < $last ? 'href="'.action('EntryController@index', $last).'"' : '' ) !!} aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endsection('content')