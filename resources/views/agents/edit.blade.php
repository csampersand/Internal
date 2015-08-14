@extends('app')

@section('scripts')

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
                        <h3 class="panel-title">Edit Agent Profile</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::model($agent, ['action' => ['AgentController@update', $agent], 'method' => 'PATCH']) !!}
                                    @include ('agents._form', ['submitButtonText' => 'Save'])
                                {!! Form::close() !!}

                                {!! Form::model($agent, ['action' => ['AgentController@destroy', $agent], 'method' => 'DELETE']) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete', [
                                            'class' => 'btn btn-default form-control',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title' => 'The agent will be removed from any events that they attended. '
                                        ]) !!}
                                    </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
                @include ('errors._list')
            </div>
        </div>

@endsection