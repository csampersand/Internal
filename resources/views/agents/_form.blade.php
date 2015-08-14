<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email: ') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone: ') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('active', false) !!}
<div class="form-group">
    {!! Form::label('active', 'Active: ') !!}
    {!! Form::checkbox('active', true, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>