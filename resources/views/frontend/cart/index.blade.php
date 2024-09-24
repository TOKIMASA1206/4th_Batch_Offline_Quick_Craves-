@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart_style.css') }}">
@endsection

@section('page-title')
    <h1 class="banner_title ar">Cart View</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Cart View</span></span>
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
                                    @foreach (Cart::content() as $item)
                                        <tr class="t_body">
                                            <td class="pro_img"><img src="{{ asset($item->options->menu_info['image']) }}"
                                                    class="cart-img" alt="{{ $item->name }}"></td>
                                            <td class="pro_name">
                                                <a href="javascript:;">{{ $item->name }}</a>
                                                <br>
                                                <span>
                                                    {{ @$item->options->menu_size['name'] }}
                                                    {{ @$item->options->menu_size['price'] ? '( ₱' . @$item->options->menu_size['price'] . ')' : '' }}
                                                </span>
                                                @foreach ($item->options->menu_options as $option)
                                                    <p>{{ $option['name'] }} (₱ {{ $option['price'] }})</p>
                                                @endforeach
                                            </td>
                                            <td class="pro_status">
                                                <h5>₱ {{ $item->price }}</h5>
                                            </td>
                                            <td class="pro_select">
                                                <div class="quantity_btn d-flex justify-content-center align-items-center">

                                                    <button class="btn btn-danger decrement">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>

                                                    <input type="text" class="form-control quantity" placeholder="1"
                                                        readonly data-id="{{ $item->rowId }}" value="{{ $item->qty }}">

                                                    <button class="btn btn-success increment">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>

                                                </div>
                                            </td>

                                            <td class="pro_tk">
                                                <h5 class="product_cart_total">₱ {{ productTotal($item->rowId) }}</h5>
                                            </td>

                                            <td class="pro_icon">
                                                <a href="#" class="remove_cart_prodcut"
                                                    data-id="{{ $item->rowId }}">
                                                    <i class="fa-regular fa-circle-xmark fs-4 fs-4"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Cart::content()->count() === 0)
                                        <tr>
                                            <td colspan="6" class="text-center d-inline" style="width: 100%;">
                                                Cart is empty!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="cart_list_checkout card shadow col-lg-3 fade-in p-4">

                    <div>
                        <h5 class="fw-bold">Total Cart</h5>

                        <hr>
                        <p class="d-flex justify-content-between fw-bold">
                            <span>Subtotal:</span>
                            <span id="subtotal">₱ {{ cartTotal() }}</span>
                        </p>
                        <p class="d-flex justify-content-between fw-bold">
                            <span>Voucher:</span>
                            <span id="subtotal">₱ 0</span>
                        </p>
                        <select name="" id="" class="form-select">
                            <option value="">Voucher</option>
                            <option value="">Voucher</option>
                            <option value="">Voucher</option>
                        </select>

                        <hr>
                        <p class="total d-flex justify-content-between"><span>Total:</span>
                            <span>₱ {{ cartTotal() }}</span>
                        </p>
                        <hr>

                        <div class="row mb-2">
                            <div class="col">
                                <p class="m-0 mt-3">▽ Payment With </p>
                            </div>
                            <div class="total-point w-50 text-end col">
                                <span class="me-2">2196 Cp</span>
                                <a class="add-point ms-2" href=""><i class="fa-solid fa-plus me-3"></i></a>
                            </div>
                        </div>
                        <button class="checkout_btn btn-yellow-black fs-5 w-100 mb-2" href=" #">Points</button>
                        <button class="checkout_btn btn-yellow-black fs-5 w-100" href=" #">Paypal</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.increment').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");
                inputField.val(currentValue + 1);

                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty);

                        let productTotal = response.product_total;
                        inputField.closest("tr")
                            .find(".product_cart_total")
                            .text('₱' + productTotal);

                        cartTotal = parseFloat(response.cartTotal).toFixed(2);
                        $('#subtotal').text("₱" + cartTotal);

                        grandCartTotal = parseFloat(response.grand_cart_total).toFixed(2);
                        $('#final_total').text("₱" + grandCartTotal);
                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            });

            $('.decrement').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");

                if (currentValue > 1) {
                    inputField.val(currentValue - 1);

                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        inputField.val(response.qty);

                        if (response.status === 'success') {
                            let productTotal = response.product_total;
                            inputField.closest("tr")
                                .find(".product_cart_total")
                                .text('₱' + productTotal);

                            cartTotal = parseFloat(response.cartTotal).toFixed(2);
                            $('#subtotal').text("₱" + cartTotal);

                            grandCartTotal = parseFloat(response.grand_cart_total).toFixed(2);
                            $('#final_total').text("₱" + grandCartTotal);
                        } else if (response.status === 'error') {
                            toastr.error(response.message);
                        }
                    });
                } else {
                    toastr.warning('Quantity cannot be less than 1');
                }
            });

            function cartQtyUpdate(rowId, qty, callback) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('cart.quantity-update') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        'rowId': rowId,
                        'qty': qty,
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        if (callback && typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }
        })
    </script>
@endpush
