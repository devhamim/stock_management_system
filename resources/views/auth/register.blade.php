@extends('auth.auth_master')

@section('content')

<div class="wrapper">
    <section class="login-content">
        <div class="container">
        <div class="row align-items-center justify-content-center height-self-center">
            <div class="col-lg-8">
                <div class="card auth-card">
                    <div class="card-body p-0">
                    <div class="d-flex align-items-center auth-content">
                        <div class="col-lg-7 align-self-center">
                            <div class="p-3">
                                <h2 class="mb-2">Sign Up</h2>
                                <p>Create your POSDash account.</p>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control @error('name') is-invalid @enderror" type="text" placeholder=" "  id="name"  name="name" value="{{ old('name') }}" required autocomplete="name">
                                            <label for="name">Full Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control @error('email') is-invalid @enderror" type="email" placeholder=" "  id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" type="number" placeholder=" " id="phone" name="phone" value="{{ old('phone') }}">
                                            <label for="phone">Phone No.</label>
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control @error('password') is-invalid @enderror" type="password" placeholder=" "  id="password" name="password" required autocomplete="new-password">
                                            <label for="password">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" type="password" placeholder=" " id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                                            <label for="password-confirm">Confirm Password</label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                <p class="mt-3">
                                    Already have an Account <a href="{{ route('login') }}" class="text-primary">Sign In</a>
                                </p>
                            </form>
                            </div>
                        </div>
                        <div class="col-lg-5 content-right">
                            <img src="../assets/images/login/01.png" class="img-fluid image-right" alt="">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>

@endsection
