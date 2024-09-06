@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart_style.css') }}">
@endsection

@section('page-title')
            <h1 class="banner_title ar">Cart View</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span class="mx-2">Cart View</span></span>
@endsection

@section('content')


            <section class="cart_view ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 wow fade-in" data-wow-duration="1s">
                            <div class="cart">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr class="t_header">
                                                <th class="pro_img">Image</th>
                                                <th class="pro_name">Details</th>
                                                <th class="pro_status">Price</th>
                                                <th class="pro_select">Quantity</th>
                                                <th class="pro_tk">Total</th>
                                                <th class="pro_icon"><a class="clear_all" href="#">Clear All</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="t_body">
                                                <td class="pro_img"><img src="{{ asset('frontend/images/slider_img_3.png') }}" class="cart-img" alt="Burger"></td>
                                                <td class="pro_name">
                                                    <a href="#">Hyderabadi Biryani</a>
                                                    <span>Medium</span>
                                                    <p>Coca-Cola</p>
                                                    <p>7up</p>
                                                </td>
                                                <td class="pro_status">
                                                    <h5>$180.00</h5>
                                                </td>
                                                <td class="pro_select">
                                                    <div class="quantity_btn d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-danger" data-action="minus" data-target="quantity1">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                        <input class="form-control" id="quantity1" type="text" value="1">
                                                        <button class="btn btn-success" data-action="plus" data-target="quantity1">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="pro_tk">
                                                    <h5>$180.00</h5>
                                                </td>
                                                <td class="pro_icon"><a href="#"><i
                                                            class="fa-regular fa-circle-xmark fs-4 fs-4"></i></i></a></td>
                                            </tr>
                                            <tr class="t_body">
                                                <td class="pro_img"><img src="{{ asset('frontend/images/slider_img_3.png') }}" class="cart-img" alt="Burger"></td>
                                                <td class="pro_name"><a href="#">Chicken Masala</a><span>Small</span>
                                                </td>
                                                <td class="pro_status">
                                                    <h5>$140.00</h5>
                                                </td>
                                                <td class="pro_select">
                                                    <div class="quantity_btn d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-danger" data-action="minus" data-target="quantity1">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                        <input class="form-control" id="quantity1" type="text" value="1">
                                                        <button class="btn btn-success" data-action="plus" data-target="quantity1">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="pro_tk">
                                                    <h5>$140.00</h5>
                                                </td>
                                                <td class="pro_icon"><a href="#"><i
                                                            class="fa-regular fa-circle-xmark fs-4"></i></i></a></td>
                                            </tr>
                                            <tr class="t_body">
                                                <td class="pro_img"><img src="{{ asset('frontend/images/slider_img_3.png') }}" class="cart-img" alt="Burger"></td>
                                                <td class="pro_name">
                                                    <a href="#">Daria Shevtsova</a>
                                                    <span>Large</span>
                                                    <p>Coca-Cola</p>
                                                    <p>7up</p>
                                                </td>
                                                <td class="pro_status">
                                                    <h5>$220.00</h5>
                                                </td>
                                                <td class="pro_select">
                                                    <div class="quantity_btn d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-danger" data-action="minus" data-target="quantity1">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                        <input class="form-control" id="quantity1" type="text" value="1">
                                                        <button class="btn btn-success" data-action="plus" data-target="quantity1">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="pro_tk">
                                                    <h5>$220.00</h5>
                                                </td>
                                                <td class="pro_icon"><a href="#"><i
                                                            class="fa-regular fa-circle-xmark fs-4"></i></i></a></td>
                                            </tr>
                                            <tr class="t_body">
                                                <td class="pro_img"><img src="{{ asset('frontend/images/slider_img_3.png') }}" class="cart-img" alt="Burger"></td>
                                                <td class="pro_name">
                                                    <a href="#">Hyderabadi Biryani</a>
                                                    <span>Medium</span>
                                                    <p>7up</p>
                                                </td>
                                                <td class="pro_status">
                                                    <h5>$150.00</h5>
                                                </td>
                                                <td class="pro_select">
                                                    <div class="quantity_btn d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-danger" data-action="minus" data-target="quantity1">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                        <input class="form-control" id="quantity1" type="text" value="1">
                                                        <button class="btn btn-success" data-action="plus" data-target="quantity1">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="pro_tk">
                                                    <h5>$150.00</h5>
                                                </td>
                                                <td class="pro_icon"><a href="#"><i
                                                            class="fa-regular fa-circle-xmark fs-4"></i></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="cart_list_checkout card shadow col-lg-3 fade-in p-4">

                            <div>
                                <h5 class="fw-bold">Total Cart</h5>

                                <hr>
                                <p class="d-flex justify-content-between fw-bold"><span>Subtotal:</span> <span>$124.00</span></p>
                                <select name="" id="" class="form-select">
                                    <option value="">Voucher</option>
                                    <option value="">Voucher</option>
                                    <option value="">Voucher</option>
                                </select>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col">
                                        <h5 class="fw-bold mt-2">Method</h5>
                                    </div>
                                    <div class="col-auto total-point"><span>2196 Cp</span><a class="add-point ms-2"
                                            href=""><i class="fa-solid fa-plus"></i></a></div>
                                </div>
                                <div class="check-method mb-1">
                                    <input class="check-method-input" name="payment" type="radio" value=""
                                        id="card">
                                    <label class="check-method-label" for="card">
                                        Credit Card
                                    </label>
                                </div>

                                <div class="check-method mb-1">
                                    <input class="check-method-input" name="payment" type="radio" value=""
                                        id="cash">
                                    <label class="check-method-label" for="cash">
                                        Cash
                                    </label>
                                </div>


                                <div class="check-method mb-1">
                                    <input class="check-method-input" name="payment" type="radio" value=""
                                        id="point">
                                    <label class="check-method-label" for="point">
                                        Point
                                    </label>
                                </div>

                                <hr>
                                <p class="total d-flex justify-content-between"><span>Total:</span> <span>$134.00</span>
                                </p>
                                <button class="checkout_btn btn-yellow-black fs-5 w-100" href=" #">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/cart_js_action.js') }}"></script>
@endpush
