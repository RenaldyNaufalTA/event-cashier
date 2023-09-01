<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="#event">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('checkPoinForm') }}">Cek Poin</a>
                </li>
                {{-- @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="bi layout-text-sidebar-reverse"></i>{{ __(' My Dashboard') }}
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="bi box-arrow-in-left
                                "></i>{{ __(' Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest --}}
            </ul>
        </div>
    </div>
</nav>
