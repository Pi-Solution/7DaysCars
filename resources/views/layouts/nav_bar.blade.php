<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">7DaysCars</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
                <div class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">My Vehicles <span class="sr-only">(current)</span></a>
                </div>
            @endauth
        </ul>
        <div class="form-inline my-2 my-lg-0">
            @guest
                <div class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                </div>
                @else
                    <a class="nav-link text-light" href="{{ route('logout') }}" onclick=" event.preventDefault(); document.getElementById('frm-logout').submit()">
                        Logout
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            @endguest
        </div>
    </div>
</nav>
