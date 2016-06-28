@extends('app')

@section('scripts')

    {!! Html::script('js/internal.focusinput.js') !!}

@endsection

@section('styles')

    <style>
        .glyphicon-plus-sign {
            float: right;
            text-decoration: none;
        }
        .fa-edit {
            float: right;
            text-decoration: none;
        }
        a:hover.glyphicon {
            text-decoration: none;
        }
        a:hover.fa {
            text-decoration: none;
        }
        h3 span {
            float: left;
        }
        .clear {
            clear: both;
        }
    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>
                {{ $event->name }}
                <a class="fa fa-edit fa-fw" href="{{ action('EventController@edit', $event->id) }}"></a>
            </h1>
            <div class="stat">
                <span class="stat-title">Date:</span> {{ $event->date->format('F j, Y') }}
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>Attendance Roster</span>
                        <a id="add-entry-button" href="#" class="glyphicon glyphicon-plus-sign"></a>
                        <div class="clear"></div>
                    </h3>
                </div>
                <div class="list-group">
                    @if(count($agents) > 0)
                        @foreach($agents as $agent)
                            <a href="{{ action('AgentController@show', $agent->id) }}" class="list-group-item">
                                {{ $agent->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div id="add-entry-form">
                {!! Form::open(['url' => action('EventController@link_agent', $event->id)]) !!}
                    <div class="form-group">
                        <div class="input-group input-group">
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'focus form-control', 'placeholder' => 'Full Name']) !!}
                            <span class="input-group-btn">
                                {!! Form::submit('Add', ['class' => 'btn btn-primary form-control']) !!}
                            </span>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection