@extends('app')

@section('styles')
    <style>
        .info-title {
            font-weight:bold;
        }

        .form-group {
            padding-bottom: 25px;
        }

        form {
            margin-top: 50px;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Attendance Roster</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <span class="info-title">Event: </span>
                                {{ $event->name }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <span class="info-title">Date: </span>
                                {{ Carbon\Carbon::parse($event->date)->toFormattedDateString() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::open(['url' => action('EntryController@store')]) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name: ') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::open(['url' => action('EntryController@store')]) !!}
                                <div class="form-group">
                                    {!! Form::label('email', 'Email: ') !!}
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::open(['url' => action('EntryController@store')]) !!}
                                <div class="form-group">
                                    {!! Form::label('phone', 'Phone: ') !!}
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection