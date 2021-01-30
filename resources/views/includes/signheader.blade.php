<div class="d-flex headerStyly">
    <a href="{{ url('/') }}" class=" me-auto">
        <img src="/images/flash-banner.png" class="bannerImg" alt="banner" width="170" height="70" />
    </a>
    <div class="d-none d-sm-inline">
        <div class="p-3 form-group bd-highlight">
            <input type="search" class="form-control me-2" placeholder="Search" />
        </div>
    </div>

    <div class="p-2">
        <ul class="nav justify-content-end">
            <!-- Authentication Links -->
            @guest

                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="btn btn-danger shadow mt-2 text-white" href="{{ route('login') }}">
                            Sign in
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li> --}}
                @endif
                
                {{-- @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->user_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
            {{-- <li class="nav-item">
                <!-- a href Open the Modal -->
                <a class="nav-link text-reset mt-2" href="#" data-bs-toggle="modal" data-bs-target="#signModal">
                    <i class="fas fa-user me-2 d-none d-sm-inline"></i> Sign in
                </a>
            </li> --}}
        </ul>
    </div>
</div>