@extends('layout.mainlayout')
@section('content')
    <div class="container">
        <div class='col-md-6 col-md-offset-3'>
            <h1>Edit Ad</h1>
            <hr>

            {!! Form::model($ad, ['method' => 'PATCH', 'action' => ['Ad\AdController@update',$ad->id]]) !!}
            @include('ad.form', ['submitButtonText' => 'save'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
