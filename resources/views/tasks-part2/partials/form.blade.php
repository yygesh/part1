<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>

<div class="form-group">
    {!! Form::label('completed', 'Completed:') !!}
    {!! Form::checkbox('completed') !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description') !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text) !!}
</div>
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Securit