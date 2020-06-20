@extends('layout.mainlayout')
@section('content')
    <div class="container">
        <div class='col-md-6 col-md-offset-3'>
            <h1>Add New Ad</h1>
            <hr>

                {!! Form::open(['action' => 'Ad\AdController@store']) !!}
                @include('ad.form', ['submitButtonText' => 'create'])
                {!! Form::close() !!}


        </div>
    </div>

@stop
