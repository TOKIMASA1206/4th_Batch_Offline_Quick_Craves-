@extends('auth.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center pb-3">
                            <img src="{{ asset('logos/Logo.png') }}" width="70rem" alt="logo">
                            <h1 class="ar">Register</h1>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- username --}}
                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror bg-secondary-subtle"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="username">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}
                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror bg-secondary-subtle"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="email">

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
                                        class="form-control @error('password') is-invalid @enderror bg-secondary-subtle"
                                        name="password" required autocomplete="new-password" placeholder="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- confirm pasword --}}
                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control bg-secondary-subtle"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="comfirm password">
                                </div>
                            </div>

                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-secondary"
                                        style="width: 170px; background: #886653">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                        <a href="{{ route('login') }}" class="d-block text-center"
                            style="text-decoration: none; color:#E06A37; font-weight: bold;">-> I have an account.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
