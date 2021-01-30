<div>
    <div class="">
        <div class="d-flex bd-highlight">
            <a href="{{ url('/') }}" class=" me-auto">
                <img src="images/flash-banner.png" class="bannerImg" alt="banner" width="170" height="70" />
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
                                <a class="btn btn-success shadow mt-2 text-white" href="{{ route('login') }}">
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
        <nav class="navbar navbar-expand-md navbar-light border-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-1">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        @auth
                            <li class="nav-item mx-1">
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                            </li>
                        @endauth
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/services">Services</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/shop">Shop now</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/blog">Forums</a>
                        </li>
                        {{-- @guest

                            @if (Route::has('login'))
                                <li class="nav-item mx-1">
                                    <a class="btn btn-primary shadow" href="{{ route('login') }}">Sign in</a>
                                </li>
                            @endif
                        @endguest --}}
                                {{-- <a class="btn btn-primary shadow" href="/login" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</a> --}}
                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <button class="nav-link me-2 btn btn-light" aria-current="page" href="#">Sign in</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link me-2 btn btn-light" aria-current="page" href="#">Sign up</button>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- The Signup Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fliud">
                        <h4 class="text-center">Register Here</h4>    
                        <p class="small text-center">Sign up here, it's very easy and quick</p>
                        <form id="register_form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row g-2 my-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder=" " autofocus />
                                        <label for="first_name">First name</label>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder=" " autofocus />
                                        <label for="last_name">Last name</label>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 my-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" id="user_name" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required autocomplete="user_name" placeholder=" " autofocus />
                                        <label for="user_name">Username</label>
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder=" " />
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating my-2">
                                <input type="password" name="password" id="floatingPassword" class="form-control fPassword @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder=" ">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating my-2">
                                <input type="password" name="password_confirmation" onkeyup="confirmPassword()" class="form-control cPassword" id="password-confirm" required autocomplete="new-password" placeholder=" " />
                                <label for="password-confirm" class="floatPass">Confirm your password</label>
                                <span class="invalid-feedback feedbackShow" role="alert" style="display: none;">
                                    Confirm password invalid
                                </span>
                            </div>
                    
                            <div class="clearfix my-3">  
                                {{-- <div class="form-group form-check float-start">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="check"/>Remember me
                                    </label>
                                </div> --}}                                                  
                            </div>
                
                        </form>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" href="{{ route('register') }}"
                                onclick="event.preventDefault(); 
                                    document.getElementById('register_form').submit();">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="d-grid gap-2 mt-2 text-center">
                            <h6>OR</h6>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fas fa-google"></i> Google</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Sign In Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
        
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fliud">
                        <h4 class="text-center">Login Here</h4>
                        <form class="form" id="log_form" method="post" action="{{ route('login') }}">
                            <div class="form-floating my-3">
                                <input type="email" name="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" ">

                                <label for="floatingInput">Email address</label>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder=" ">
                                
                                <label for="floatingPassword">Password</label>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="clearfix my-3">  
                                <div class="form-group form-check float-start">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="check"/>Remember me
                                    </label>
                                </div>
                                <div class=" float-end">
                                    <a href="#">Forgot Password?</a>
                                </div>                                                    
                            </div>
                           
                        </form>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" href="{{ route('login') }}"
                                onclick="event.preventDefault(); 
                                    document.getElementById('log_form').submit();">
                                {{ __('Sign in') }}
                            </button>
                        </div>
                        <div class="d-grid gap-2 text-center">
                            <h6>OR</h6>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fas fa-google"></i> Google</a>
                            {{-- <button class="btn btn-danger" type="button">Sign in with Gmail</button> --}}
                            <p class="small">Not Registered? <a href="#">Sign up here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    confirmPassword=()=>{
        var inputOne = document.querySelector('.fPassword');
        var inputChange = document.querySelector('.cPassword');

        if(inputChange.value === inputOne.value){
            inputChange.style.border = '2px solid #ccc';
            document.querySelector('.floatPass').style.color = '#000';
            document.querySelector('.feedbackShow').style.display = "none";
        } else{
            inputChange.style.border = '2px solid red';
            document.querySelector('.floatPass').style.color = 'red';
            document.querySelector('.feedbackShow').style.display = "block";
        }   
    }
</script>