<div class="col-sm-12">
    <div class='form-group'>
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
    </div>
</div>

