@section('title', 'Email Reset Password')
@extends('layouts.base')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                    class="brand-image img-circle elevation-3" width="55px" />
            <strong class="h1 ml-2">{{ __('Barangay 264') }}</strong>
        </div>
        <div class="card-body">
            <p class="login-box-msg">
                Reset Password thourgh your Email
            </p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control 
                        @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" 
                        required autocomplete="email" autofocus 
                        placeholder="Enter your Email Address"/>

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

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
    
            <div class="row justify-content-start mt-3">
                <div class="col-md-12">
                    <p class="mb-1 ml-1">
                        <a href="{{ route('login') }}" class="text-center">
                            {{ __('Login') }}
                        </a>
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="mb-1 ml-1">
                        <a href="{{ route('register') }}" class="text-center">
                            {{ __('Register Account') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


