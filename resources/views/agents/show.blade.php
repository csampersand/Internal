@extends('app')

@section('styles')
    <style>
        .clear {
            clear: both;
        }
        .fa-pencil-square-o {
            float: right;
            font-size: 20px;
        }
        a:hover.fa {
            text-decoration: none;
        }
        .agent-profile {
            margin-top: 25px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>
                <i class="fa fa-fw fa-user"></i> {{ $agent->name }}
                <small>({{ $agent->active ? 'Active' : 'Inactive' }})</small>
            </h2>

            <div class="agent-profile panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="title">Agent Profile</span>
                        <a class="fa fa-pencil-square-o" href="{{ action('AgentController@edit', $agent->id) }}"></a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="stat">
                                <div class="stat-title">Email:</div>
                                <a href="mailto:{{ $agent->email }}">{{ $agent->email }}</a>
                            </div>
                            <div class="stat">
                                <div class="stat-title">Phone:</div>
                                <a href="tel:{{ $agent->phone }}">
                                    {{ $agent->phone }}
                                    <span class="glyphicon glyphicon-phone-alt"></span>
                                </a>
                            </div>
                        </div>


                        <!-- Temporary progress bar -->
                        <div class="col-sm-6">
                            <div class="stat">
                                <span class="stat-title">Ignite Progress:</span>
                                <span>{{ $training }} / 17</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="{{ $training }}" aria-valuemin="0" aria-valuemax="17" style="width: {{ ($training / 17) * 100 }}%">
                                    <span class="sr-only">{{ ($training / 17) * 100 }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End temporary progress bar -->
                    </div>
                </div>

                @if(count($events) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-sm-5">Event ({{ $events->count() }})</th>
                            <th class="col-sm-3">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr{!! ($event->lesson && $event->lesson->course->id === 1 ? ' class="success"' : '') !!}>
                                <td><a href="{{ action('EventController@show', $event->id) }}">{{ $event->name }}</a></td>
                                <td>{{ $event->date->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
