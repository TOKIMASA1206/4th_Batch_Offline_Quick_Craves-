@extends('auth.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center pb-3">
                            <img src="{{ asset('logos/Logo.png') }}" width="70rem" alt="logo">
                            <h1 class="ar">Log in</h1>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                {{-- email --}}
                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror bg-secondary-subtle" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror  bg-secondary-subtle" name="password"
                                        required autocomplete="current-password" placeholder="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-secondary" style="width: 170px; background: #886653">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>

                        <p class="text-center">Already Have an Account?
                            <a href="{{ route('register') }}" style="text-decoration: none; color:#E06A37; font-weight: bold;">Create Account.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
