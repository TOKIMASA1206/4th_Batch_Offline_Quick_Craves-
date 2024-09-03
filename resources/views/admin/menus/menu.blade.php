<div class="tab-pane fade" id="v-pills-menu" role="tabpanel"
                                        aria-labelledby="v-pills-menu-tab">
                                        <div class="fp_dashboard_body">
                                            <div class="container">

                                                <ul class="navbar-nav ms-auto mb-2" style="width: 100px">
                                                    <button type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#add-category-{{-- $category->id --}}"
                                                        style="background-color: rgb(156, 150, 176) ">
                                                        <span class="palanquin-dark-regular" style="color: white">+
                                                            ADD</span>
                                                    </button>
                                                </ul>

                                                <div class="row justify-content-center">
                                                    <div class="col-2 palanquin-dark-regular text-center">
                                                        <div class="list-group">
                                                            {{--　ここ Foreach 使う --}}

                                                            <div class=" wow fadeInUp" data-wow-duration="1s">
                                                                <div class="fp__dashboard_menu">

                                                                    <div class="nav flex-column nav-pills palanquin-dark-regular"
                                                                        id="v-pills-tab" role="tablist"
                                                                        aria-orientation="vertical"
                                                                        style="background:white!important">

                                                                        <button class="nav-link active"
                                                                            id="v-pills-category-tab1"
                                                                            data-bs-toggle="pill"
                                                                            data-bs-target="#v-pills-category-1{{-- -id --}}"
                                                                            type="button" role="tab"
                                                                            aria-controls="v-pills-category1"
                                                                            aria-selected="false"
                                                                            style="color: black"><span
                                                                                style="background:black"><i
                                                                                    class="fa-solid fa-star"></i></span>Food</button>

                                                                        <button class="nav-link"
                                                                            id="v-pills-category-tab2"
                                                                            data-bs-toggle="pill"
                                                                            data-bs-target="#v-pills-category-2{{-- -id --}}"
                                                                            type="button" role="tab"
                                                                            aria-controls="v-pills-category2"aria-selected="false"
                                                                            style="color: black"><span
                                                                                style="background:black"><i
                                                                                    class="fa-solid fa-star"></i></span>Drink</button>

                                                                        <button class="nav-link"
                                                                            id="v-pills-category-tab3"
                                                                            data-bs-toggle="pill"
                                                                            data-bs-target="#v-pills-category-3{{-- -id --}}"
                                                                            type="button" role="tab"
                                                                            aria-controls="v-pills-category3"
                                                                            aria-selected="false"
                                                                            style="color: black"></span><span
                                                                                style="background:black"><i
                                                                                    class="fa-solid fa-star"></i></span>Pizza</button>


                                                                        {{-- <a href="#" class="list-group-item">FOOD</a>
                                                                    <a href="#" class="list-group-item" >DRINK</a>
                                                                    <a href="#" class="list-group-item">PIZZA</a>
                                                                    <a href="#" class="list-group-item">BURGER</a> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade col-10 show active" id="v-pills-category-1"
                                                        role="tabpanel" aria-labelledby="v-pills-category-tab1">
                                                        <div class="fp_dashboard_body">


                                                            <table
                                                                class="table table-hover align-middle bg-white border text-secondary palanquin-dark-regular text-center">
                                                                <thead class="small text-secondary">
                                                                    <tr class="h6">
                                                                        <th style="color: rgb(52, 52, 117)">ID</th>
                                                                        <th style="color: rgb(52, 52, 117)">IMAGE</th>
                                                                        <th style="color: rgb(52, 52, 117)">NAME</th>
                                                                        <th style="color: rgb(52, 52, 117)">PRICE</th>
                                                                        <th style="color: rgb(52, 52, 117)">DESCRIPTION
                                                                        </th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{ asset('admin/logo/burger.jpg') }}"
                                                                                style="width: 130px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td>
                                                                            <div class="d-flex flex-row">
                                                                                <button type="submit"
                                                                                    class="text-warning rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-menu-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-pen-to-square text-dark"></i>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="text-danger rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-menu-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-trash-can text-dark"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="dropdown-item text-secondary"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                                </button>

                                                                                <div class="dropdown-menu">
                                                                                    {{-- @if ($post->trashed())
                                                                                            <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post{{ $post->id }}
                                                                                            </button>
                                                                                        @else --}}
                                                                                    <button
                                                                                        class="dropdown-item text-danger"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#inactivate-post-{{-- $post->id --}}"><i
                                                                                            class="fa-solid fa-eye-slash"></i>Inactivate
                                                                                        Menu
                                                                                    </button>
                                                                                    {{-- @endif --}}
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        @include('admin.menus.modal.status')
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{ asset('admin/logo/burger.jpg') }}"
                                                                                style="width: 130px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td>
                                                                            <div class="d-flex flex-row">
                                                                                <button type="submit"
                                                                                    class="text-warning rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-menu-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-pen-to-square text-dark"></i>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="text-danger rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-menu-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-trash-can text-dark"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="dropdown-item text-secondary"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                                </button>

                                                                                <div class="dropdown-menu">
                                                                                    {{-- @if ($post->trashed())
                                                                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post{{ $post->id }}
                                                                                        </button>
                                                                                    @else --}}
                                                                                    <button
                                                                                        class="dropdown-item text-success"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#activate-post-{{-- $post->id --}}"><i
                                                                                            class="fa-solid fa-eye"></i>Activate
                                                                                        Menu
                                                                                    </button>
                                                                                    {{-- @endif --}}
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{ asset('admin/logo/burger.jpg') }}"
                                                                                style="width: 130px"></td>
                                                                        <td>Cheese Burger</td>
                                                                        <td>100p</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>55</td>
                                                                        <td><img src="{{ asset('admin/logo/burger.jpg') }}"
                                                                                style="width: 130px"></td>
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
