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
                                                <img src="{{ asset(@Auth::user()->profile->avatar) }}" alt="">
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
                                            <a href="{{route('wallet.index')}}" class="wallet">
                                                <div class="link-icon mb-3 ">
                                                    <i class="fa-solid fa-wallet text-center mx-0"></i>
                                                </div>
                                                <h4 class="user-name">Wallet</h4>
                                            </a>
                                        </div>
                                        <div class="col card-bg p-4 ms-3">
                                            <a href="{{route('proceed_index')}}" class="proceed">
                                                <div class="link-icon mb-3">
                                                    <i class="fa-solid fa-arrow-right text-center mx-0"></i>
                                                </div>
                                                <h4 class="user-name">Proceed</h4>
                                            </a>
                                        </div>
                                        <div class="col card-bg p-4 ms-3">
                                            <a href="{{route('cart_index')}}" class="cart">
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
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="personal-info card-bg py-4 px-5">
                                            <button id="edit-btn"
                                                class="info-edit-btn btn-yellow-black float-end m-0">Edit</button>
                                            <button id="cancel-btn"
                                                class="info-cancel-btn btn-yellow-black float-end m-0">Cancel</button>
                                            <h3 class="menu-section-title mb-4 mt-2">
                                                Personal Info
                                            </h3>
                                            <div id="info-content" class="menu-section-content">
                                                <div class="row mb-3">
                                                    <div class="col">Name:</div>
                                                    <div class="col">{{ @Auth::user()->name }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Email:</div>
                                                    <div class="col">{{ @Auth::user()->email }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Phone Number:</div>
                                                    <div class="col">
                                                        @if (@Auth::user()->profile->phone)
                                                            {{ @Auth::user()->profile->phone }}
                                                        @else
                                                            Not set yet.
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Gender:</div>
                                                    <div class="col">
                                                        @if (@Auth::user()->profile->gender)
                                                            {{ @Auth::user()->profile->gender }}
                                                        @else
                                                            Not set yet.
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Age:</div>
                                                    <div class="col">
                                                        @if (@Auth::user()->profile->age)
                                                            {{ @Auth::user()->profile->age }}
                                                        @else
                                                            Not set yet.
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('profile_update') }}" method="post" id="edit-form"
                                                class="edit-form text-center px-3" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row mb-3">
                                                    <label for="name"
                                                        class="form-label fw-bold text-start p-0">Profile Image</label>
                                                    <img src="{{ asset(@Auth::user()->profile->avatar) }}" class="mb-3"
                                                        alt="" style="max-width: 400px">

                                                    <input type="file" id="name" name="avatar" value=""
                                                        class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="name"
                                                        class="form-label fw-bold text-start p-0">Name</label>
                                                    <input type="text" id="name" name="name"
                                                        value="{{ @Auth::user()->name }}" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="email"
                                                        class="form-label fw-bold text-start p-0">Email</label>
                                                    <input type="text" id="email" name="email"
                                                        value="{{ @Auth::user()->email }}" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="phone"
                                                        class="form-label fw-bold text-start p-0">Phone</label>
                                                    <input type="text" id="phone" name="phone"
                                                        value="{{ @Auth::user()->profile->phone }}" class="form-control">
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col text-start p-0">
                                                        <label for="gender"
                                                            class="form-label fw-bold text-start p-0">Gender</label>
                                                        <select id="gender" name="gender" class="form-control">
                                                            <option value="">Select Gender</option>
                                                            <option value="male"
                                                                {{ old('gender', @Auth::user()->profile->gender) == 'male' ? 'selected' : '' }}>
                                                                Male</option>
                                                            <option
                                                                value="female"{{ old('gender', @Auth::user()->profile->gender) == 'female' ? 'selected' : '' }}>
                                                                Female</option>
                                                            <option value="other"
                                                                {{ old('gender', @Auth::user()->profile->gender) == 'other' ? 'selected' : '' }}>
                                                                Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col text-start">
                                                        <label for="age"
                                                            class="form-label fw-bold text-start p-0">Age</label>
                                                        <input type="number" id="age" name="age"
                                                            class="form-control"
                                                            value="{{ old('age', @Auth::user()->profile->age) }}">
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="edit-form-save btn-brown mx-auto">Save</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Order Content -->
                                    <div class="tab-pane fade" id="v-pills-order" role="tabpanel"
                                        aria-labelledby="v-pills-order-tab">
                                        <div class="body">
                                            <h3 class="menu-section-title mb-3 mt-2 ar">
                                                Order List
                                            </h3>
                                            <div class="order">
                                                <div class="table-responsive">
                                                    <table class="table text-center">
                                                        <thead>
                                                            <tr class="t_header">
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#2545758745</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 16, 2022</p>
                                                                </td>
                                                                <td>
                                                                    <span class="complete">Complated</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$560</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#2457945235</h5>
                                                                </td>
                                                                <td>
                                                                    <p>jan 21, 2021</p>
                                                                </td>
                                                                <td>
                                                                    <span class="complete">Complated</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$654</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#2456875648</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 11, 2020</p>
                                                                </td>
                                                                <td>
                                                                    <span class="active">active</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$440</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#7896542130</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 16, 2022</p>
                                                                </td>
                                                                <td>
                                                                    <span class="active">active</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$225</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#4587964125</h5>
                                                                </td>
                                                                <td>
                                                                    <p>jan 21, 2021</p>
                                                                </td>
                                                                <td>
                                                                    <span class="cancel">cancel</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$335</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#4579654153</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 11, 2020</p>
                                                                </td>
                                                                <td>
                                                                    <span class="cancel">cancel</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$550</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#12547965423</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 16, 2022</p>
                                                                </td>
                                                                <td>
                                                                    <span class="complete">Complated</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$545</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#4589635878</h5>
                                                                </td>
                                                                <td>
                                                                    <p>jan 21, 2021</p>
                                                                </td>
                                                                <td>
                                                                    <span class="cancel">cancel</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$600</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                            <tr class="t_body">
                                                                <td>
                                                                    <h5>#89698745895</h5>
                                                                </td>
                                                                <td>
                                                                    <p>July 11, 2020</p>
                                                                </td>
                                                                <td>
                                                                    <span class="complete">complete</span>
                                                                </td>
                                                                <td>
                                                                    <h5>$200</h5>
                                                                </td>
                                                                <td><a class="view_invoice btn-yellow-black p-1">
                                                                        Details</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="invoice">
                                                <div class="invoice_header ">
                                                    <div class="header_address ">
                                                        <p class="p-0 m-0"><b>invoice no: </b><span>4574</span></p>
                                                        <p class="p-0 m-0"><b>Order ID:</b> <span> #4789546458</span></p>
                                                        <p class="p-0 m-0"><b>date:</b> <span>10-11-2022</span></p>
                                                    </div>
                                                    <span class="go_back btn-yellow-black  h-50 mt-3"><i
                                                            class="fas fa-long-arrow-alt-left"></i> go back</span>
                                                </div>
                                                <div class="invoice_body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr class="t_header">
                                                                    <th class="sl_no">SL</th>
                                                                    <th class="package">item description</th>
                                                                    <th class="price">Price</th>
                                                                    <th class="qnty">Quantity</th>
                                                                    <th class="total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="sl_no">01</td>
                                                                    <td class="package">
                                                                        <p>Hyderabadi Biryani</p>
                                                                        <span class="size">small</span>
                                                                        <span class="coca_cola">coca-cola</span>
                                                                        <span class="coca_cola2">7up</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">02</td>
                                                                    <td class="package">
                                                                        <p>Daria Shevtsova</p>
                                                                        <span class="size">medium</span>
                                                                        <span class="coca_cola">coca-cola</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">03</td>
                                                                    <td class="package">
                                                                        <p>Hyderabadi Biryani</p>
                                                                        <span class="size">large</span>
                                                                        <span class="coca_cola2">7up</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">04</td>
                                                                    <td class="package">
                                                                        <p>Hyderabadi Biryani</p>
                                                                        <span class="size">medium</span>
                                                                        <span class="coca_cola">coca-cola</span>
                                                                        <span class="coca_cola2">7up</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">05</td>
                                                                    <td class="package">
                                                                        <p>Daria Shevtsova</p>
                                                                        <span class="size">large</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">04</td>
                                                                    <td class="package">
                                                                        <p>Hyderabadi Biryani</p>
                                                                        <span class="size">medium</span>
                                                                        <span class="coca_cola">coca-cola</span>
                                                                        <span class="coca_cola2">7up</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="sl_no">04</td>
                                                                    <td class="package">
                                                                        <p>Hyderabadi Biryani</p>
                                                                        <span class="size">medium</span>
                                                                        <span class="coca_cola">coca-cola</span>
                                                                        <span class="coca_cola2">7up</span>
                                                                    </td>
                                                                    <td class="price">
                                                                        <b>$120</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>2</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$240</b>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="package" colspan="2">
                                                                        <b>sub total</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b>12</b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$755</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="package text-danger" colspan="2">
                                                                        <b>(-) Voucher</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b></b>
                                                                    </td>
                                                                    <td class="total text-danger">
                                                                        <b>$0.00</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="package" colspan="2">
                                                                        <b>Total Paid</b>
                                                                    </td>
                                                                    <td class="qnty">
                                                                        <b></b>
                                                                    </td>
                                                                    <td class="total">
                                                                        <b>$765</b>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Change Password Content -->
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <div class="change-password card-bg  py-4 px-5">
                                            <h3 class="menu-section-title mb-4 mt-2">Change Password</h3>
                                            <form action="{{ route('profile_password_update') }}" method="post"
                                                class="change-password-content text-center px-3">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row mb-3">
                                                    <label for="current_password"
                                                        class="form-label fw-bold text-start p-0">Current Password</label>
                                                    <input type="text" id="current_password" name="current_password"
                                                        class="form-control" placeholder="current_password">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="new_password"
                                                        class="form-label fw-bold text-start p-0">New password</label>
                                                    <input type="text" id="new_password" name="new_password"
                                                        class="form-control" placeholder="new_password">
                                                </div>
                                                <div class="row mb-5">
                                                    <label for="new_password_confirmation"
                                                        class="form-label fw-bold text-start p-0">Confirm Password</label>
                                                    <input type="text" id="new_password_confirmation"
                                                        name="new_password_confirmation" class="form-control"
                                                        placeholder="comfirm_password">
                                                </div>
                                                <button type="submit"
                                                    class="password-save btn-brown mx-auto">Submit</button>
                                            </form>
                                        </div>
                                    </div>
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
