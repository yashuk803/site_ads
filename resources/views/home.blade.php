@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Ads</h3>
                </div>
                @auth
                    <div class="pull-right">
                        <a href="{{ route('create') }}" class="btn btn-success">Add Ad</a>
                    </div>
                @endauth
            </div>
        </div>

        <div class="row">


            @foreach ($ads as $ad)
                <div class="col-md-4">
                    <div class="card" style="margin-bottom: 10px">
                        <div class="card-body" style="padding: 10px;">

                            <h5 class="card-title"><a target="_blank"
                                                      href="{{ route('show', ['id' => $ad->id]) }}">{{ $ad->title }}</a>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->author->username }}
                                / {{ $ad->getFromDateAttribute() }}</h6>
                            <p class="card-text">{{ $ad->description }}</p>
                            @auth
                                @if(Auth::user()->id === $ad->author_id)
                            <a href="{{ route('edit', ['id' => $ad->id]) }}" class="card-link">Edit</a>
                                @endif
                            @endauth

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
