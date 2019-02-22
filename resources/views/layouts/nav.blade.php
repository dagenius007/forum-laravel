<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/sckoolhouse.svg') }}" alt="{{ config('app.name', 'Forum') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a class="navbar__active" href="{{ route('home') }}">Home</a></li>
                @if (Auth::guest())

                <li><a href="{{ route('login') }}">Categories</a></li>
                <li class="{{ Request::url() == url('/login') ? 'navbar__active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <li><a href="{{ route('profile', Auth::user()->slug) }}">My Profile</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
                <li class="search">
                    <a href="#">
                        <form action="/search" method="post">
                            {{ csrf_field() }}
                            <div class="search__input">
                                <input type="text" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </a>
                </li>
                {{-- <li class="search_tab"><a href=""><i class="fa fa-search"></i></a></li> --}}

            </ul>
        </div>
    </div>
</nav>