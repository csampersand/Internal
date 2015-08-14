@extends('app')

@section('scripts')
    {!! Html::script('js/internal.agentsearch.js') !!}

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1><i class="fa fa-fw fa-user"></i> Agents</h1>
            <div class="btn-toolbar" role="toolbar" aria-label="...">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="{{ action('AgentController@create') }}" class="btn btn-primary"><i class="fa fa-user-plus fa-fw"></i> New Agent</a>
                </div>
                <div class="btn-group" role="group" aria-label="...">
                    <button id="toggle-inactive" type="button" class="btn btn-default"><i class="fa fa-eye-slash fa-fw"></i> <span id="toggle-inactive-text">Hide Inactive</span></button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Agent Directory</div>
                <input type="text" id="agentSearch" placeholder="Search agents..." class="form-control filter-term">
                <table class="table table-hover">
                    <thead>
                        <th data-sort="string">Name</th>
                        <th data-sort="int">Events</th>
                        <th data-sort="int">Active</th>
                    </thead>
                    @if(count($agents) > 0)
                        @foreach ($agents as $agent)
                            <tr class="agent {{ ($agent->active ? 'agent-active' : 'agent-inactive') }}">
                                <td>
                                    <a href="{{ action('AgentController@show', $agent->id) }}">{{ $agent->name }}</a>
                                </td>
                                <td>{{ count($agent->events) }}</td>
                                <td data-sort-value="{{ $agent->active ? '1' : '0' }}">
                                    <i class="fa fa-fw {{ $agent->active ? 'fa-check' : 'fa-times' }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection