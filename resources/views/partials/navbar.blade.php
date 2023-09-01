<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('Kasir') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @auth

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    @if (auth()->user()->isAdmin == true)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}"
                                href="{{ route('user') }}">{{ __('User') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('transaction*') ? 'active' : '' }}"
                                href="{{ route('transaction.index') }}">{{ __('Transaction') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('event*') ? 'active' : '' }}"
                                href="{{ route('event.index') }}">{{ __('Event') }}</a>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">
                                <i class="bi bi-house"></i>{{ __('Back to Home') }}
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i>{{ __(' Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
            @endauth

        </div>
    </div>
</nav>
