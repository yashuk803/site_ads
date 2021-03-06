<section class="jumbotron">
    <div class="container">


        @auth
            <h1> Welcome {{ Auth::user()->username }} </h1>
        @else

            <h1 class="jumbotron-heading">Login</h1>


            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>

                    <input id="username"
                           type="text"
                           class="form-control @error('username')is-invalid @enderror"
                           name="username"
                           value="{{ old('username') }}"
                           required
                           autocomplete="username"
                           autofocus
                    >

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input id="password"
                           type="password"
                           class="form-control @error('password')is-invalid @enderror"
                           name="password"
                           required
                           autocomplete="password"
                           autofocus
                    >

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                </div>
                <button type="submit" class="btn btn-primary-outline">Login</button>
            </form>
        @endauth



    </div>
</section>
