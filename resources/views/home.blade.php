@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Ads</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success">Add Ad</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif



        <div class="row">


            @foreach ($ads as $ad)
                <div class="col-md-4">
                    <div class="card" style="margin-bottom: 10px">
                        <div class="card-body" style="padding: 10px;">

                            <h5 class="card-title"> <a target="_blank" href="{{ route('ad.show', ['id' => $ad->id]) }}">{{ $ad->title }}</a></h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->author->username }} / {{ $ad->getFromDateAttribute() }}</h6>
                            <p class="card-text">{{ $ad->description }}</p>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

            @endforeach




        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $ads->links() !!}
            </div>

        </div>
    </div>

@endsection
