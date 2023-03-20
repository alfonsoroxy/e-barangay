@section('title', 'Change Password')
@extends('layouts.base')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex align-items-center justify-content-center">
            <a href="{{ route('home-component') }}" class="d-flex align-items-center justify-content-center text-center">
                <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                    class="brand-image img-circle elevation-3" width="55px" />
                <strong class="card-text h1 ml-2 text-dark">{{ __('Change Password') }}</strong>
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">
                You are only one step a way to your change password, change your password now.
            </p>
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('update-password') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <input name="old_password" type="password" 
                        class="form-control @error('old_password') is-invalid @enderror" 
                        id="oldPasswordInput" placeholder="Old Password" required />
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="new_password" type="password" class="form-control 
                        @error('new_password') is-invalid @enderror" id="newPasswordInput" 
                        placeholder="New Password" required />

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="new_password_confirmation" type="password" 
                    class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password" />
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Change Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection