


        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Pronos-potos') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::segment(1) === 'equipes' ? 'active' : null }}">
                            <a class="nav-link" href="/equipes">Equipes <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'pronostics' ? 'active' : null }}">
                            <a class="nav-link" href="/pronostics">Pronostics <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'classement' ? 'active' : null }}">
                            <a class="nav-link" href="/classement">Classement <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'reglement' ? 'active' : null }}">
                            <a class="nav-link" href="/règles">Règlement <span class="sr-only">(current)</span></a>
                        </li>
                        @if(Auth::user() && Auth::user()->isAdmin == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/admin/users">Membres</a>
                              <a class="dropdown-item" href="/admin/matchs">Résultats</a>
                            </div>
                        </li>
                        @endif


                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class= "nav-item"><a class="nav-link" href="posts/create">Create Post</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->pseudo }} <span class="caret"></span>
                                </a>                                

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>