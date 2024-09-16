<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/buttonDesigns.css') }}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Title Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Amarante&family=Chelsea+Market&display=swap" rel="stylesheet">

    {{-- Common Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JS CDNs  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success fixed-alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger fixed-alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="alert fixed-alert"></div>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand amarante-regular" href="#">
                    <img src="{{ asset('admin/logo/logo.png') }}" class="me-2 img-fluid" style="width: 60px">Quick Crave
                    Admin
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="row">

                <div class="col-md-3">
                    @include('admin.layouts.sidebar')
                </div>

                <div class="col-md-9">
                    @yield('content')
                </div>

            </div>
        </main>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            /** Success & Error message notification **/
            $('.alert').hide().fadeIn(1000);

            setTimeout(function() {
                $('.alert').fadeOut(1000);
            }, 3000);


            /* Sweet Alert Config  */
            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status === 'success') {

                                    // Show success alert message
                                    $('.alert')
                                        .removeClass('alert-danger')
                                        .addClass('alert-success')
                                        .text(response.message)
                                        .hide().fadeIn(1000);

                                    setTimeout(function() {
                                        $('.alert').fadeOut(1000);
                                    }, 3000);

                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "The Data has been deleted.",
                                        icon: "success"
                                    }).then(() => {
                                        window.location.reload();
                                    });

                                } else if (response.status === 'error') {

                                    // Show error alert message
                                    $('.alert')
                                        .removeClass('alert-success')
                                        .addClass('alert-danger')
                                        .text(response.message)
                                        .hide().fadeIn(1000);

                                    setTimeout(function() {
                                        $('.alert').fadeOut(1000);
                                    }, 3000);
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
        })
    </script>
    @stack('scripts')
</body>

</html>
