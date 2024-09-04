@extends('admin.layouts.app')

@section('content')

    <body>

        <section class="fp__dashboard mt_120 xs_mt_90 mb_100 xs_mb_70">
            <div class="container">
                <div class="fp__dashboard_area">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__dashboard_menu">


                                <div class="nav flex-column nav-pills palanquin-dark-regular" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical"
     !important">

                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home-1" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="false"><span
                                        ><i class="fa-solid fa-house"></i></span>HOME</button>

                                    <button class="nav-link" id="v-pills-menu-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-menu" type="button" role="tab"
                                        aria-controls="v-pills-menu" aria-selected="true"><span><i
                                                class="fa-solid fa-utensils"></i>
                                        </span>MENU</button>

                                    <button class="nav-link" id="v-pills-category-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-category" type="button" role="tab"
                                        aria-controls="v-pills-category" aria-selected="true"><span
                                        ><i
                                                class="fa-solid fa-star"></i></span>CATEGORY</button>

                                    <button class="nav-link" id="v-pills-user-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-user" type="button" role="tab"
                                        aria-controls="v-pills-user" aria-selected="false"><span
                                        ><i class="fa-solid fa-users"></i></span>USER</button>

                                    <button class="nav-link" id="v-pills-proceed-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-proceed" type="button" role="tab"
                                        aria-controls="v-pills-proceed" aria-selected="false"><span
                                        ><i
                                                class="fa-solid fa-forward"></i></span>PROCEED</button>

                                    <button class="nav-link" type="button"><span> <i
                                                class="fas fa-sign-out-alt"></i>
                                        </span>Logout</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s"
                            >
                            <div class="fp__dashboard_content">
                                <div class="tab-content" id="v-pills-tabContent">

                                    {{-- -------------------------------- HOME  --------------------------------------- --}}

                                    @include('admin/home/home')

                                    {{-- -------------------------------- MENU  --------------------------------------- --}}

                                    @include('admin/menus/menu')

                                    {{-- -------------------------------- CATEGORY  --------------------------------------- --}}

                                    @include('admin/categories/category')

                                    {{-- -------------------------------- USER --------------------------------------- --}}

                                    @include('admin/users/user')

                                    {{-- -------------------------------- PROCEED --------------------------------------- --}}

                                    @include('admin/proceeds/proceed')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
    </html>
@endsection
