@section('title', 'Login')
@extends('layouts.base')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex align-items-center justify-content-center">
            <a href="{{ route('home-component') }}">
                <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                    class="brand-image img-circle elevation-3" width="55px" />
                <strong class="h1 ml-2 text-dark">{{ __('Barangay 264') }}</strong>
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                         placeholder="Email Address" />
                         <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                         </div>
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" placeholder="Password" />
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="input-group ml-3">
                    <div class="form-check-input" type="checkbox" name="remember" id="remember" 
                        {{ old('remember') ? 'checked' : '' }}>
                            <input type="checkbox" id="remember" />
                            <label for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
    
            <div class="row justify-content-start">
                <div class="col-md-12">
                    <p class="mb-1">
                        @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                </a>
                        @endif
                    </p>
                    <div class="col-md-12">
                        <p class="mb-1 ml-1">
                            <a href="{{ route('register') }}" class="text-center">{{ __('Register Account') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection