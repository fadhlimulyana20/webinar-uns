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
                <li class="nav-item my-auto px-1">
                    <a href="" class="btn btn-sm btn-block btn-success font-weight-bold">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>