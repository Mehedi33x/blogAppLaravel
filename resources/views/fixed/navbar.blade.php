<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="{{route('home.page')}}">
            <h3 class="sitetitle">BlogApp</h3>
        </a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                        <path
                            d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z">
                        </path>
                    </svg></span>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.page') }}">Stories <span
                            class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.create') }}">Create Post</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="profile.html">View Profile</a>
                            <a class="dropdown-item" href="settings.html">Settings</a>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.signup') }}">SignUp</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
