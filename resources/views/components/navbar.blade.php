<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src={{asset('image/Logo-UNS-Biru.png')}} width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Webinar <span class="font-weight-bold">UNS</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href={{route('index')}}>Home</a>
                </li>
                <li class="nav-item {{ (request()->is('tentang')) ? 'active' : '' }}">
                    <a class="nav-link" href={{route('about')}}>Tentang</a>
                </li>
                <li class="nav-item {{ (request()->is('webinar')) ? 'active' : '' }}">
                    <a class="nav-link" href={{route('webinar.index')}}>Webinar</a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item my-auto px-1">
                        <a class="btn btn-sm btn-block btn-success font-weight-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item my-auto px-1">
                            <a class="btn btn-sm btn-block btn-success font-weight-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nama }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
