<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('date', 'Date: ') !!}
    {!! Form::input('date', 'date', $event->date->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lesson_id', 'Type: ') !!}
    {!! Form::select('lesson_id', $lessons, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::button($submitButtonText, ['type' => 'submit', 'class' => 'btn btn-primary form-control']) !!}
</div>