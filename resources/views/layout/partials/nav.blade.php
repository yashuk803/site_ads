<div class="navbar navbar-inverse bg-inverse">

    <div class="container d-flex justify-content-betIen">

        <a href="{{ route('home') }}" class="navbar-brand">Ad</a>

        @auth
            <a href="#" class="navbar-brand">Create Ad</a>

            <a href="{{ route('logout') }}" class="navbar-brand">Logout</a>

        @endauth

    </div>

</div>
