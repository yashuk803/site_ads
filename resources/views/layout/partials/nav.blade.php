<div class="navbar navbar-inverse bg-inverse">

    <div class="container d-flex justify-content-betIen">

        <a href="#" class="navbar-brand">Ad</a>

        @if(Auth::guard('user')->check())
            <a href="#" class="navbar-brand">Create Ad</a>

            <a href="{{ route('auth.logout') }}" class="navbar-brand">Logout</a>

            <a href="#" class="navbar-brand"> {{ Auth::guard('user')->user()->username }}</a>
        @endif

    </div>

</div>
