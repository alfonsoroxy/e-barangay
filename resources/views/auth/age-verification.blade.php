@section('title', 'Age Verification')
@extends('layouts.base')

@section('title', 'Age Verification')
<div class="login-box">
    <div class="card card-outline card-primary text-center">
        <div class="card-header d-flex align-items-center justify-content-center">
            <a href="{{ route('home-component') }}">
                <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                    class="brand-image img-circle elevation-3" width="55px" />
                <strong class="h1 ml-2">{{ __('Age Verification') }}</strong>
            </a>
        </div>
        <div class="card-body text-center">
            <p class="card-text">
                {{ __('Sorry you cannot access the system because youre a minor.') }}
            </p>
            <p class="card-text">
                <a href="{{ route('home-component') }}">{{ __('Go to Home') }}</a>
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