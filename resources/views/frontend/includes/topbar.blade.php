<div class="container-fluid d-none d-lg-block">
    <div class="row d-flex bg-dark px-lg-3 py-2">
        <div class="col-lg-12 align-items-center">
            <nav class="navbar navbar-expand-sm bg-dark p-0 justify-content-between">
                <div class="justify-content-start">
                    <a href="{{ route('home.index') }}" class="navbar-brand p-0 d-none d-lg-block">
                        <img src="{{ asset('assets/img/logo.jpeg') }}" alt="logo" class="img-fluid rounded-circle" style="height: 80px;">
                    </a>
                </div>
                <ul class="navbar-nav ml-n2 justify-content-end">
                    <li class="nav-item border-right border-secondary navigation-list">
                        <a class="nav-link text-body" href="{{ route('home.aboutUs')}}">About</a>
                    </li>  
                    <li class="nav-item border-right border-secondary navigation-list">
                        <a class="nav-link text-body" href="{{ route('home.contact')}}">Contact</a>
                    </li>
                    @guest
                    <li class="nav-item border-left border-secondary">
                        <a href="{{ route('auth.index') }}" class="nav-link btn btn-primary btn-sm">Login</a>
                    </li>
                    @else
                   <li class="nav-item border-right border-secondary navigation-list">
                        <a class="nav-link text-body" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link btn btn-primary btn-sm" href="{{route(auth()->user()->role . '.dashboard.index')}}">Dashboard</a>
                    </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </div>
</div>
