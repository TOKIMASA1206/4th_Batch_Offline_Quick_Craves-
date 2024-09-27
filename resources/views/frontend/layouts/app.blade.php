<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amarante&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Title Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Amarante&family=Chelsea+Market&display=swap" rel="stylesheet">

    {{-- Common Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/buttonDesigns.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/wallet-page.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pointChargeModal.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/voucherModal.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/menuIndex.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="loading-overlay-container d-none">
        <div class="loading-overlay">
            <span class="loader"></span>
        </div>
    </div>

    {{-- Pop-Up Modal --}}
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body load_menu_modal_body">

                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <!--============ Header ===================-->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid px-5">
                <a class="navbar-brand fs-2 ar" href="{{ url('/') }}">
                    <img src="{{ asset('logos/Logo.png') }}" width="70rem" alt="logo"> Quick Craves
                </a>
                <div class="d-flex">
                    <a href="{{ route('cart_index') }}" class="me-5 mt-2" style="position: relative">
                        <i class="fa fa-shopping-basket fs-4 header-cart" aria-hidden="true"></i>
                        <span class="cart_count">{{ Cart::content()->count() }}</span>
                    </a>
                    <div id="search_bar">
                        <form class="form-inline my-2 my-lg-0 d-flex gap-2">
                            <div>
                                <input class="form-control mr-sm-2" type="search" placeholder="Search Menu"
                                    aria-label="Search">
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div id="content" style="width: 100%" class="ba">
            <div class="d-flex">

                <!--============ Sidebar ===================-->
                <div>

                    <!-- Hamberder Menu -->
                    <button class="hamburger-menu" id="hamburger-btn">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <!-- side bar -->
                    <div id="sidebar">
                        <ul class="sidebar-nav">
                            <li class="pt-3 mb-2" id="search_sidebar">
                                <form class="form-inline w-50 ms-3">
                                    <div>
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search Menu"
                                            aria-label="Search">
                                    </div>
                                </form>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ url('/') }}" class="sidebar-link">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('profile_index') }}" class="sidebar-link">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('wallet.index') }}" class="sidebar-link">
                                    <i class="fa-solid fa-wallet"></i>
                                    <span>Wallet</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('cart_index') }}" class="sidebar-link">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span>My Cart</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('proceed_index') }}" class="sidebar-link">
                                    <i class="fa-solid fa-play"></i>
                                    <span>Proceed</span>
                                </a>
                            </li>
                            @can('admin')
                                <li class="sidebar-item mb-5">
                                    <a href="{{ route('admin.index') }}" class="sidebar-link">
                                        <i class="fa-solid fa-user-tie"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                            @endcan

                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="sidebar-item">
                                        <a href="{{ route('login') }}" class="sidebar-link">
                                            <i class="fa-solid fa-right-to-bracket"></i>
                                            <span>{{ __('Login') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="sidebar-item">
                                        <a href="{{ route('register') }}" class="sidebar-link">
                                            <i class="fa-solid fa-user-plus"></i>
                                            <span>{{ __('Register') }}</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>

                <!--============ Main ===================-->
                <main style="width: 100%">
                    <div id="content" style="width: 100%">
                        <main>
                            <div id="page-title" class="mb-5">
                                <div class="overlay"></div>
                                <div class="fade-in page-text">
                                    @yield('page-title')
                                    @yield('sub-title')
                                </div>
                            </div>

                            <!-- Content  -->
                            <div class="content-inner mx-auto pb-5">
                                @yield('content')
                            </div>
                        </main>
                    </div>
                </main>
            </div>
        </div>
        <!--============ Footer ===================-->
        <footer class="">
            <div class="container p-3 fade-in">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <a class="footer-title d-flex align-items-center mb-3" href="{{ url('/') }}">
                            <img src="{{ asset('logos/Logo.png') }}" alt="logo" class="footer-logo me-2">
                            <h5 class="text-uppercase mb-0">Quick Craves</h5>
                        </a>

                        <p>
                            Satisfy your cravings with our quick and delicious options. Your satisfaction is our
                            priority.
                        </p>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Navigation</h5>
                        <ul class="row mb-0">
                            <li class="col-md-2">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="col-md-2">
                                <a href="{{ route('profile_index') }}">Profile</a>
                            </li>
                            <li class="col-md-2">
                                <a href="{{ route('wallet.index') }}">Wallet</a>
                            </li>
                            <li class="col-md-2">
                                <a href="{{ route('cart_index') }}">Cart</a>
                            </li>
                            <li class="col-md-2">
                                <a href="{{ route('proceed_index') }}">Proceed</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Column 3 -->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Contact Us</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <i class="fa-solid fa-envelope"></i> info@quickcraves.com
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i> +1 234 567 890
                            </li>
                            <li>
                                <i class="fa-solid fa-map-marker-alt"></i> 123 Main St, City, Country
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>
            <div class="text-center fade-in pt-2">
                © 2024 Quick Craves. All rights reserved.
            </div>
        </footer>

        {{-- Javascript --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
        <script src="{{ asset('frontend/js/sidebar.js') }}"></script>
        <script src="{{ asset('frontend/js/animate.js') }}"></script>

        {{-- フロント全体で使用するJSはここに記載 --}}
        @include('frontend.layouts.components.global-scripts')


        @stack('scripts')

        <script>

        </script>

</body>

</html>
