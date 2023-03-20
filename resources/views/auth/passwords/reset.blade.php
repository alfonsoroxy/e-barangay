@section('title', 'Reset Password')
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
                You are only one step a way from your new password, recover your password now.
            </p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control 
                        @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" 
                        required autocomplete="email" autofocus />

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
                    <input id="password" type="password" class="form-control 
                        @error('password') is-invalid @enderror" name="password" 
                        required autocomplete="new-password" placeholder="New Password" />

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" 
                        class="form-control" name="password_confirmation" 
                        required autocomplete="new-password" placeholder="Confirm Password" />

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


