@section('title', 'Register')
@extends('layouts.base')

@section('content')
<div class="card card-outline card-primary m-5">
    <div class="card-header d-flex align-items-center justify-content-center">
        <a href="{{ route('home-component') }}">
            <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                class="brand-image img-circle elevation-3" width="55px" />
            <strong class="h1 ml-2 text-dark">{{ __('Barangay 264') }}</strong>
        </a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Register a new account</p>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mb-3">
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>First Name <code>*</code></label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" 
                            name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                            placeholder="First Name" />
                        
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Last Name <code>*</code></label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" 
                            name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                            placeholder="Last Name" />
                        
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Middle Initial</label>
                        <input id="mname" type="text" class="form-control" 
                            name="mname" value="{{ old('mname') }}" autocomplete="mname" autofocus
                            maxlength="1" placeholder="Middle Name" />
                        
                        @error('mname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Suffix</label>
                        <input id="suffix" type="text" class="form-control" 
                            name="suffix" value="{{ old('suffix') }}" autocomplete="suffix" autofocus
                            placeholder="Suffix" />
                        
                        @error('suffix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>House No. <code>*</code></label>
                        <input id="houseNumber" type="number" class="form-control @error('houseNumber') is-invalid @enderror" 
                            name="houseNumber" value="{{ old('houseNumber') }}" required required autocomplete="houseNumber" autofocus
                            placeholder="House No." />
                        
                        @error('houseNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Street Name <code>*</code></label>
                        <select id="streetName" class="form-control @error('streetName') is-invalid @enderror" 
                            name="streetName" autofocus required >\
                            <option value="">Select Address</option>
                            <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                            <option value="G. Masangkay St">G. Masangkay St</option>
                            <option value="Mayhaligue St">Mayhaligue St</option>
                        </select>

                        @error('streetName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Birthdate <code>*</code></label>
                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" 
                            name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus />
                        
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Gender <code>*</code></label>
                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" 
                            name="gender" autofocus required >
                            <option value="">Select Gender</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Marital Status <code>*</code></label>
                        <select id="maritalStatus" class="form-control @error('maritalStatus') is-invalid @enderror" 
                            name="maritalStatus" autofocus required >
                            <option value="">Select Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        
                        @error('maritalStatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nationality <code>*</code></label>
                        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" 
                            name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" autofocus
                            placeholder="Nationality" />
                        
                        @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Contact</label>
                        <input id="contact" type="tel" class="form-control" maxlength="12"
                            name="contact" value="{{ old('contact') }}" autocomplete="contact" autofocus
                            placeholder="e.x 63+" />
                        
                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Upload Image <code>this is for account verification purposes (Max: 1MB, 1x1)</code></label>
                        <input id="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" name="image"
                            value="{{ old('image') }}" required autocomplete="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Email <code>*</code></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com"/>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Password <code>*</code></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="new-password" placeholder="Password"/>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Confirm Password <code>*</code></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                            required autocomplete="new-password" placeholder="Confirm Password" />

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group ">
                            <input type="checkbox" id="terms" name="terms" 
                            value="approved" required />
                            <label for="terms">
                                I agree with the
                                <a href="{{ route('faq-component') }}/#collapseOne"
                                    target="_blank" rel="noopener noreferrer">
                                    Data Privacy Agreement
                                </a>
                            </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ route('login') }}" class="text-center">
            {{ __('I already have a account') }}
        </a>
    </div>
</div>
@endsection