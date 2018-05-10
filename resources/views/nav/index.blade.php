<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/">MovieTalk!</a>
        <div id="search-container" class="text-center">
            <form id="search" method='GET' action='/search' class="form-inline my-2 my-lg-0">
                <input name='term' id='term' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                @if(Auth::check())
                <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <button class="nav-link">Logout</a>
                </form>
                @else
                    <a class="nav-link" href='/login'>Login</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
    