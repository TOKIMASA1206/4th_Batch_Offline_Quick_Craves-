@extends('admin.layouts.app')

@section('content')

<body>

    <section class="fp__dashboard mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="fp__dashboard_area">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__dashboard_menu">
                            {{-- <div class="dasboard_header">
                                <div class="dasboard_header_img">
                                    <img src="images/comment_img_2.png" alt="user" class="img-fluid w-100">
                                    <label for="upload"><i class="far fa-camera"></i></label>
                                    <input type="file" id="upload" hidden>
                                </div>
                            </div> --}}


                            <div class="nav flex-column nav-pills palanquin-dark-regular" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical" style="background:rgb(156, 150, 176) !important">

                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home-1" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="false"><span style="background: black"><i class="fa-solid fa-house"></i></span>HOME</button>

                                <button class="nav-link" id="v-pills-menu-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-menu" type="button" role="tab" aria-controls="v-pills-menu"
                                    aria-selected="true"><span style="background: black"><i class="fa-solid fa-utensils"></i>
                                    </span>MENU</button>

                                <button class="nav-link" id="v-pills-category-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-category" type="button" role="tab"
                                    aria-controls="v-pills-category" aria-selected="true"><span style="background: black"><i class="fa-solid fa-star"></i></span>CATEGORY</button>

                                <button class="nav-link" id="v-pills-user-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-user" type="button" role="tab"
                                    aria-controls="v-pills-user" aria-selected="false"><span style="background: black"><i class="fa-solid fa-users"></i></span>USER</button>

                                <button class="nav-link" id="v-pills-proceed-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-proceed" type="button" role="tab"
                                aria-controls="v-pills-proceed" aria-selected="false"><span style="background: black"><i class="fa-solid fa-forward"></i></span>PROCEED</button>

                                <button class="nav-link" type="button"><span style="background: black"> <i class="fas fa-sign-out-alt"></i>
                                    </span>Logout</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s" style="background: rgb(199, 199, 245)">
                        <div class="fp__dashboard_content">
                            <div class="tab-content" id="v-pills-tabContent">

                            {{---------------------------------- HOME  -----------------------------------------}}

                                <div class="tab-pane fade show active" id="v-pills-home-1" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="fp_dashboard_body">
                                        <h3>HOME</h3>
                                    </div>
                                </div>

                            {{---------------------------------- MENU  -----------------------------------------}}


                                <div class="tab-pane fade" id="v-pills-menu" role="tabpanel"
                                    aria-labelledby="v-pills-menu-tab">
                                    <div class="fp_dashboard_body">
                                        <div class="container">

                                            <ul class="navbar-nav ms-auto mb-2" style="width: 100px">
                                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#add-category-{{-- $category->id --}}" style="background-color: rgb(156, 150, 176) ">
                                                    <span class="palanquin-dark-regular" style="color: white">+ ADD</span>
                                                </button>
                                            </ul>

                                            <div class="row justify-content-center">
                                                <div class="col-2 palanquin-dark-regular text-center">
                                                    <div class="list-group">
                                                        {{--　ここ Foreach 使う --}}

                                                        <div class=" wow fadeInUp" data-wow-duration="1s">
                                                            <div class="fp__dashboard_menu">

                                                                <div class="nav flex-column nav-pills palanquin-dark-regular" id="v-pills-tab" role="tablist"
                                                                aria-orientation="vertical" style="background:white!important">

                                                                    <button class="nav-link active" id="v-pills-category-tab1" data-bs-toggle="pill"
                                                                    data-bs-target="#v-pills-category-1{{-- -id --}}" type="button" role="tab"
                                                                    aria-controls="v-pills-category1" aria-selected="false" style="color: black"><span style="background: black"><i class="fa-solid fa-star"></i></span>Food</button>

                                                                    <button class="nav-link" id="v-pills-category-tab2" data-bs-toggle="pill"
                                                                    data-bs-target="#v-pills-category-2{{-- -id --}}" type="button" role="tab" aria-controls="v-pills-category2"aria-selected="false" style="color: black"><span style="background: black"><i class="fa-solid fa-star"></i></span>Drink</button>

                                                                    <button class="nav-link" id="v-pills-category-tab3" data-bs-toggle="pill"
                                                                    data-bs-target="#v-pills-category-3{{-- -id --}}" type="button" role="tab"
                                                                    aria-controls="v-pills-category3" aria-selected="false" style="color: black"></span><span style="background: black"><i class="fa-solid fa-star"></i></span>Pizza</button>


                                                                    {{-- <a href="#" class="list-group-item">FOOD</a>
                                                                    <a href="#" class="list-group-item" >DRINK</a>
                                                                    <a href="#" class="list-group-item">PIZZA</a>
                                                                    <a href="#" class="list-group-item">BURGER</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade col-10 show active" id="v-pills-category-1" role="tabpanel" aria-labelledby="v-pills-category-tab1">
                                                <div class="fp_dashboard_body">


                                                        <table class="table table-hover align-middle bg-white border text-secondary palanquin-dark-regular">
                                                            <thead class="small text-secondary">
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>IMAGE</th>
                                                                    <th>NAME</th>
                                                                    <th>PRICE</th>
                                                                    <th>DESCRIPTION</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{asset('admin/logo/burger.jpg')}}" style="width: 60px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td>
                                                                        <div class="d-flex flex-row">
                                                                            <button type="submit" class="text-warning rounded form-control w-auto mx-1" data-bs-toggle="modal" data-bs-target="#edit-category-{{-- $category->id --}}" style="background-color: rgb(156, 150, 176);">
                                                                            <i class="fa-regular fa-pen-to-square text-dark"></i>
                                                                            </button>
                                                                            <button type="submit" class="text-danger rounded form-control w-auto mx-1" data-bs-toggle="modal" data-bs-target="#delete-category-{{-- $category->id --}}" style="background-color: rgb(156, 150, 176);">
                                                                                <i class="fa-regular fa-trash-can text-dark"></i>
                                                                            </button>
                                                                        </div>
                                                                        </td>
                                                                        <td>
                                                                                <div class="dropdown">
                                                                                    <button class="dropdown-item text-secondary" data-bs-toggle="dropdown">
                                                                                        <i class="fa-solid fa-ellipsis"></i>
                                                                                    </button>

                                                                                    <div class="dropdown-menu">
                                                                                        {{-- @if ($post->trashed())
                                                                                            <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post{{ $post->id }}
                                                                                            </button>
                                                                                        @else --}}
                                                                                            <button class="dropdown-item text-secondary" data-bs-toggle="modal" data-bs-target="#deactivate-post-{{-- $post->id --}}"><i class="fa-solid fa-eye-slash"></i> Hide Menu
                                                                                            </button>
                                                                                        {{-- @endif --}}
                                                                                    </div>
                                                                                </div>
                                                                        </td>
                                                                        @include('admin.menus.modal.status')
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{asset('admin/logo/burger.jpg')}}" style="width: 60px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{asset('admin/logo/burger.jpg')}}" style="width: 60px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{asset('admin/logo/burger.jpg')}}" style="width: 60px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                            </tbody>
                                                        </table>

                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            {{---------------------------------- CATEGORY  -----------------------------------------}}

                                <div class="tab-pane fade" id="v-pills-category" role="tabpanel"
                                    aria-labelledby="v-pills-category-tab">
                                    <div class="fp_dashboard_body">
                                        <h3>CATEGORY</h3>
                                    </div>
                                </div>


                            {{---------------------------------- USER -----------------------------------------}}

                                <div class="tab-pane fade" id="v-pills-user" role="tabpanel"
                                    aria-labelledby="v-pills-user-tab">
                                    <div class="fp_dashboard_body">
                                        <ul class="navbar-nav ms-auto mb-2 w-25">
                                            <form action="{{-- route('admin.search') --}}">
                                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search for names">
                                            </form>
                                        </ul>
                                        <table class="table table-hover align-middle bg-white border text-secondary">
                                            <thead class="small table-success text-secondary">
                                                <tr>
                                                    <th></th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>CREATED AT</th>
                                                    <th>STATUS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                                        </td>
                                                        <td>Hikaru</td>
                                                        <td>Hikaru.email</td>
                                                        <td>2024/8/21</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                                        </td>
                                                        <td>Hikaru</td>
                                                        <td>Hikaru.email</td>
                                                        <td>2024/8/21</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                                        </td>
                                                        <td>Hikaru</td>
                                                        <td>Hikaru.email</td>
                                                        <td>2024/8/21</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                                        </td>
                                                        <td>Hikaru</td>
                                                        <td>Hikaru.email</td>
                                                        <td>2024/8/21</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                                        </td>
                                                        <td>Hikaru</td>
                                                        <td>Hikaru.email</td>
                                                        <td>2024/8/21</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            {{---------------------------------- PROCEED -----------------------------------------}}


                                <div class="tab-pane fade" id="v-pills-proceed" role="tabpanel"
                                    aria-labelledby="v-pills-proceed-tab">
                                    <div class="fp_dashboard_body">
                                        <h3>PROCEED</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--jquery library js-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <!--bootstrap js-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="js/Font-Awesome.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- isotop js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- simplyCountdownjs -->
    <script src="js/simplyCountdown.js"></script>
    <!-- counter up js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.min.js"></script>
    <!-- nice select js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- venobox js -->
    <script src="js/venobox.min.js"></script>
    <!-- sticky sidebar js -->
    <script src="js/sticky_sidebar.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- ex zoom js -->
    <script src="js/jquery.exzoom.js"></script>

    <!--main/custom js-->
    <script src="js/main.js"></script>

</body>

</html>


@endsection







