<div class="container-fluid p-0 text-center">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('home.index') }}" class="navbar-brand d-block d-lg-none mx-auto">
            <img src="{{ asset('assets/img/logo.jpeg') }}" alt="logo" class="img-fluid rounded-circle" style="height: 80px;">
        </a>
        @auth
            <a href="{{ route(auth()->user()->role . '.dashboard.index') }}" class="btn btn-lg d-lg-none" data-toggle="tooltip" data-placement="bottom" title="Dashboard">
                <i class="fas fa-tachometer-alt"></i>
            </a>
        @else
            <a href="{{ route('auth.index') }}" class="btn btn-lg d-lg-none" data-toggle="tooltip" data-placement="bottom" title="Login">
                <i class="fas fa-sign-in-alt"></i>
            </a>
        @endauth
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <ul class="navbar-nav mr-auto py-0">
                @foreach ($menu as $index => $menuItem)
                    <li class="nav-item{{ sizeof($menuItem['itemMenu']) > 0 ? ' dropdown' : '' }}">
                        @if (sizeof($menuItem['itemMenu']) > 0)
                            <a href="{{ $menuItem['link'] }}" class="nav-link dropdown-toggle"
                                id="navbarDropdown{{ $index }}" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ $menuItem['menu'] }}
                            </a>
                            <div class="dropdown-menu rounded-0 m-0" aria-labelledby="navbarDropdown{{ $index }}">
                                @foreach ($menuItem['itemMenu'] as $itemMenu)
                                    <a href="{{ $itemMenu['sub_menu_link'] }}" class="dropdown-item"
                                        target="{{ $itemMenu['sub_menu_target'] }}">
                                        {{ $itemMenu['sub_menu_nama'] }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <a href="{{ $menuItem['link'] }}" class="nav-link" target="{{ $menuItem['target'] }}">
                                {{ $menuItem['menu'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('home.aboutUs')}}" class="btn btn-lg d-lg-none" data-toggle="tooltip" data-placement="bottom" title="About">
                <i class="fas fa-info-circle"></i>
            </a> <span class="d-lg-none">|</span>
            <a href="{{ route('home.contact')}}" class="btn btn-lg d-lg-none" data-toggle="tooltip" data-placement="bottom" title="Contact">
                <i class="fas fa-envelope"></i>
            </a>
            @guest
            @else
                <span class="d-lg-none">|</span>
                <a href="{{ route('auth.logout') }}" class="btn btn-lg d-lg-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </nav>
</div>

{{-- JS + JQuery --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggler = document.querySelector('.navbar-toggler');

    toggler.addEventListener('click', function() {
        toggler.classList.toggle('active');
    });
});
</script>
