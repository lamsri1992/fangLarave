<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">โรงพยาบาลฝาง</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
        aria-label="Search" hidden>
    <div class="navbar-nav">
        <div class="row">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">
                    {{ Auth::user()->name }}
                </a>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link px-3"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('ออกจากระบบ') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</header>
