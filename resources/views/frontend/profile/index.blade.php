@extends('frontend.layouts.app')

@section('title', 'Profile')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile_style.css') }}">
@endsection

@section('page-title')
    <h1 class="banner_title ar">User Dashboard</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">User Dashboard</span></span>
@endsection

@section('content')

    <div class="row fade-in">

        <div class="col profile">
            <div class="container">
                <div class="main">
                    <div class="card-style">
                        <div class="row">
                            <div class="col-lg-3 profile-menu">
                                <div class="card-bg">
                                    <div class="profile-menu-top p-4 mb-3">
                                        <div class="user-icon">
                                            @if (@Auth::user()->profile->avatar)
                                                <img src="{{ @Auth::user()->profile->avatar }} alt="">
                                            @else
                                                <i class="fa-solid fa-user text-center mx-0"></i>
                                            @endif
                                        </div>
                                        <h4 class="user-name ar">{{ @Auth::user()->name }}</h4>
                                    </div>
                                    <div class="profile-menu-bottom">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <button class="nav-link p-0 active " id="v-pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-home" type="button" role="tab"
                                                aria-controls="v-pills-home" aria-selected="true">
                                                <span class="profile-menu-item-left">
                                                    <i class="fa-solid fa-user text-center mx-0"></i>
                                                </span>
                                                <span class=" profile-menu-item-right">
                                                    Personal info
                                                </span>
                                            </button>
                                            <button class="nav-link p-0" id="v-pills-order-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-order" type="button" role="tab"
                                                aria-controls="v-pills-order" aria-selected="false">
                                                <span class="profile-menu-item-left">
                                                    <i class="fas fa-box"></i>
                                                </span>
                                                <span class=" profile-menu-item-right">
                                                    Order
                                                </span>
                                            </button>
                                            <button class="nav-link p-0" id="v-pills-settings-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-settings" type="button" role="tab"
                                                aria-controls="v-pills-settings" aria-selected="false">
                                                <span class="profile-menu-item-left">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <span class=" profile-menu-item-right">
                                                    Password
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content col-md  p-3 pe-4 pb-4">
                                <h2 class="mb-4 ar">Welcome To Your Profile </h2>
                                <div class=" profile-content-link mb-5">

                                    <div class="row">

                                        <div class="col card-bg p-4">
                                            <a href="{{ route('wallet.index') }}" class="wallet">
                                                <div class="link-icon mb-3 ">
                                                    <i class="fa-solid fa-wallet text-center mx-0"></i>
                                                </div>
                                                <h4 class="user-name">Wallet</h4>
                                            </a>
                                        </div>
                                        <div class="col card-bg p-4 ms-3">
                                            <a href="{{ route('proceed_index') }}" class="proceed">
                                                <div class="link-icon mb-3">
                                                    <i class="fa-solid fa-arrow-right text-center mx-0"></i>
                                                </div>
                                                <h4 class="user-name">Proceed</h4>
                                            </a>
                                        </div>
                                        <div class="col card-bg p-4 ms-3">
                                            <a href="{{ route('cart_index') }}" class="cart">
                                                <div class="link-icon mb-3">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </div>
                                                <h4 class="user-name">Cart</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-content">
                                    <!-- Profile Info Content -->
                                    @include('frontend.profile.components.profile-info')

                                    <!-- Order Content -->
                                    @include('frontend.profile.components.order-list')

                                    <!-- Change Password Content -->
                                    @include('frontend.profile.components.change-password')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/profile_js_action.js') }}"></script>
@endpush
