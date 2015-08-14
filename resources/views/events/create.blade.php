@extends('app')

@section('scripts')

    {!! Html::script('js/internal.classtoname.js') !!}

@endsection

@section('content')

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create New Event</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($event = new App\Event, ['url' => action('EventController@store')]) !!}
                                    @include('events._form', ['submitButtonText' => 'Create'])
                                {!! Form::close() !!}


                            </div>
                        </div>
                    </div>
                </div>
                @include('errors._list')
            </div>
        </div>

@endsection