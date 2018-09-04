<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('admin.index') }}">{{ __('site.title') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ url()->current() == route('site.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('site.index') }}"><i class="fas fa-home"></i> {{ __('admin.home') }}
                </a>
            </li>
            @auth
                <li class="nav-item {{ url()->current() == route('admin.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.index') }}"><i
                                class="fas fa-unlock"></i> {{ __('site.admin-panel') }}
                    </a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-globe"></i> {{ __('site.site-language') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('en*') ? 'active' : '' }}"
                       href="{{ url('en') }}">{{ __('site.english') }}</a>
                    <a class="dropdown-item {{ Request::is('uk*') ? 'active' : '' }}"
                       href="{{ url('uk') }}">{{ __('site.ukrainian') }}</a>
                    <a class="dropdown-item {{ Request::is('ru*') ? 'active' : '' }}"
                       href="{{ url('ru') }}">{{ __('site.russian') }}</a>
                </div>
            </li>
            @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{ __('site.profile') }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('login') }}"
                           class="dropdown-item {{ url()->current() == route('login') ? 'active' : '' }}">{{ __('site.login') }}</a>
                        <a href="{{ route('register') }}"
                           class="dropdown-item {{ url()->current() == route('register') ? 'active' : '' }}">{{ __('site.register') }}</a>
                        <a href="{{ route('password.request') }}"
                           class="dropdown-item {{ url()->current() == route('password.request') ? 'active' : '' }}">{{ __('site.reset-password') }}</a>
                    </div>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile.index') }}" class="dropdown-item">{{ __('site.profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('site.logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>