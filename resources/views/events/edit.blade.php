@extends('app')

@section('scripts')

    {!! Html::script('js/events.create.js') !!}
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

@endsection

@section('content')

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Event</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($event, ['action' => ['EventController@update', $event->id], 'method' => 'PATCH']) !!}
                                    @include('events._form', ['submitButtonText' => 'Save'])
                                {!! Form::close() !!}

                                {!! Form::model($event, ['action' => ['EventController@destroy', $event->id], 'method' => 'DELETE']) !!}

                                    <div class="form-group">
                                        {!! Form::button('Delete', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-default form-control',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title' => 'The event will be removed from any agents that attended. '
                                        ]) !!}
                                    </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
                @include('errors._list')
            </div>
        </div>

@endsection