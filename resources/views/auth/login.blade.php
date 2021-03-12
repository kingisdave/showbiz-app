@extends('layouts.app')

@section('content')
    <div class="w-100">
        @include('includes.signheader')
        <div class="signWrapper">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="card border-0 shadow signCard mx-auto">         
                            <div class="card-body">
                                <h5 class="fw-bold text-center">Login here</h5>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-floating my-3">
                                        <input type="email" name="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder=" ">

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
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link float-end" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif                                                   
                                    </div>
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                                {{-- <div class="d-grid gap-2">
                                    <button class="btn btn-primary" href="{{ route('login') }}"
                                        onclick="event.preventDefault(); 
                                            document.getElementById('log_form').submit();">
                                        {{ __('Sign in') }}
                                    </button>
                                </div> --}}
                                <div class="d-grid gap-2 text-center">
                                    <h6>OR</h6>
                                    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fas fa-google"></i> Google</a>
                                    {{-- <button class="btn btn-danger" type="button">Sign in with Gmail</button> --}}
                                    <p class="fw-bold">Not Registered? <a href="{{ url('/register') }}" class="text-danger">Sign up here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
