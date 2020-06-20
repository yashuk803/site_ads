@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Show Ad</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $ad->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $ad->description }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author Name:</strong>
                    {{ $ad->author->username }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Created Date Time:</strong>
                    {{ $ad->getFromDateAttribute() }}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        @auth
                            @if(Auth::user()->id === $ad->author_id)
                        <a href="{{ route('edit', ['id' => $ad->id]) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('delete', ['id' => $ad->id]) }}" class="btn btn-danger">Delete</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
