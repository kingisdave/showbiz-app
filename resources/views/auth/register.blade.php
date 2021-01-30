@extends('layouts.app')

@section('content')
    @include('includes.signheader')
    <div class="registerWrapper">
        <div class="row">
            <div class="col-md-6 leftSided signWrapper">
    
            </div>
            <div class="col-md-6">
                <div class="row registWrapper d-flex justify-content-center align-items-center">
                    <div class="col-md-10 m-2">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <h4 class="text-center">Register Here</h4>    
                                <p class="small text-center">Sign up here, it's very easy and quick</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row g-2 my-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" id="full_name" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder=" " autofocus />
                                                <label for="full_name">Full name</label>
                                                @error('full_name')
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
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                                {{-- <div class="d-grid gap-2">
                                    <button class="btn btn-primary" href="{{ route('register') }}"
                                        onclick="event.preventDefault(); 
                                            document.getElementById('register_form').submit();">
                                        {{ __('Register') }}
                                    </button>
                                </div> --}}
                                <div class="d-grid gap-2 mt-2 text-center">
                                    <h6>OR</h6>
                                    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fas fa-google"></i> Google</a>
                                    {{-- <button class="btn btn-danger" type="button">Sign up with Gmail</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
