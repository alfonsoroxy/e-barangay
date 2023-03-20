@section('title', 'Email Verification')
@extends('layouts.base')

@section('content')
<div class="login-box">

    <div class="card card-outline card-primary text-center">
        <div class="card-header d-flex align-items-center justify-content-center">
            <a href="{{ route('home-component') }}">
                <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                    class="brand-image img-circle elevation-3" width="55px" />
                <strong class="h1 ml-2">{{ __('Email Verification') }}</strong>
            </a>
        </div>

        <div class="card-body text-center">

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="card-text">
                {{ __('The activation link has been sent through your ') }}
                <span class="text-danger">Email Address</span>
                {{ __('before you gain access to the system.') }}
            </p>
            <p class="card-text">
                {{ __('If you did not receive the email') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                    </form>
            </p>
            <p class="card-text">
                {{ __('Or') }}
            </p>
            <p class="card-text">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout Account') }}
                </a>
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection