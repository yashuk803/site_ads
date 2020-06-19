<div class="navbar navbar-inverse bg-inverse">

    <div class="container d-flex justify-content-betIen">

        <a href="#" class="navbar-brand">Ad</a>

        @auth
            <a href="#" class="navbar-brand">Create Ad</a>

            <a href="{{ route('auth.logout') }}" class="navbar-brand">Logout</a>

            <a href="#" class="navbar-brand"> {{ Auth::user()->username }}</a>
        @endauth

    </div>

</div>
