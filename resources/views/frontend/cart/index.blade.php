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
                                        <tr class="t_body cart-item-list">
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
                                                <a href="#" class="remove_cart_product"
                                                    data-id="{{ $item->rowId }}">
                                                    <i class="fa-regular fa-circle-xmark fs-4 fs-4"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Cart::content()->count() === 0)
                                        <tr>
                                            <td colspan="6" class="text-center fw-bold">
                                                Cart is empty! <a href="{{ url('/') }}" class="fs-5 text-success">->
                                                    Check our Foods!</a>
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
                            <span id="discount">
                                @if (isset(session()->get('voucher')['discount']))
                                    - ₱ {{ session()->get('voucher')['discount'] }}
                                @else
                                    ₱ 0
                                @endif
                            </span>
                        </p>
                        <select name="" id="voucher_select" class="form-select">
                            <option value="">Select Voucher</option>
                            @foreach ($vouchers as $voucher)
                                <option value="{{ $voucher->id }}" @if (session()->has('voucher') && session('voucher.id') == $voucher->id) selected @endif>
                                    {{ $voucher->name }}
                                </option>
                            @endforeach
                            <option value="">Cancel</option>
                        </select>

                        <hr>
                        <p class="total d-flex justify-content-between">
                            <span>Total:</span>
                            <span id="final_total">
                                ₱
                                {{ isset(session()->get('voucher')['discount']) ? cartTotal() - session()->get('voucher')['discount'] : cartTotal() }}
                            </span>
                        </p>
                        <hr>

                        <div class="row mb-3">
                            <div class="col">
                                <p class="m-0 mt-3 fw-normal">▽ Payment With </p>
                            </div>
                            <div class="total-point text-end col-auto p-2 me-2">
                                @if (Auth::user()->points)
                                    <span class="">
                                        {{ Auth::user()->points->point_balance }} Cp
                                    </span>
                                @else
                                    <span class="">
                                        0 Cp
                                    </span>
                                @endif
                                <a class="add-point ms-1" href="{{ route('wallet.index') }}"><i
                                        class="fa-solid fa-circle-plus"></i></a>
                            </div>
                        </div>
                        <button class="checkout_btn btn-yellow-black fs-5 w-100 mb-3" id="pay-with-points"
                            data-bs-toggle="modal" data-bs-target="#pointCheckoutModal"> Points
                        </button>

                        <button class="payment-method paypal_btn  w-100" data-name="paypal"
                            style="background-image: url('{{ asset('logos/paypal-logo.webp') }}')">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.cart.modals.points_checkout')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var cartTotal = parseFloat("{{ cartTotal() }}");

            // ============ Item Increment btn =============//
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

            // ============ Item Decrement =============//
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

            //========== 商品の数が変更された際にqtyをajaxで送信 ===========//
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

            //========== Voucher select ===========//
            $('#voucher_select').on('change', function() {
                let selectedVoucher = $(this).val();
                let subTotal = parseFloat($('#subtotal').text().replace('₱', '').trim());

                if (selectedVoucher) {
                    voucherApply(selectedVoucher, subTotal);
                } else {
                    $('#discount').text('₱ 0');
                    $('#final_total').text('₱ ' + subTotal.toFixed(2));

                    $.ajax({
                        method: 'POST',
                        url: "{{ route('remove-voucher') }}",
                        data: {},
                        success: function(response) {
                            toastr.info(response.message);
                        },
                        error: function(xhr, status, error) {
                            toastr.error('Failed to remove voucher.');
                        }
                    });
                }
            })

            function voucherApply(voucher, subTotal) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('apply-voucher') }}",
                    data: {
                        voucher: voucher,
                        subTotal: subTotal,
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $('#discount').text('- ₱' + response.discount.toFixed(2));
                        $('#final_total').text('₱ ' + response.finalTotal.toFixed(2));
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(index, value) {
                                toastr.error(value);
                            });
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            toastr.error(xhr.responseJSON.message);
                        } else {
                            toastr.error('An unexpected error has occurred.');
                        }
                        $('#voucher_select').val('');
                    },
                    complete: function() {
                        hideLoader();
                    }
                });
            }

            //========== Remove Products from cart =========== //
            $('.remove_cart_product').on('click', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id');
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
                        removeCartProduct(rowId);
                        $(this).closest('tr').remove();
                    }
                });
            })

            function removeCartProduct(rowId) {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart-product-remove', ':rowId') }}".replace(":rowId", rowId),
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        cartTotal = response.cartTotal;
                        $('#subtotal').text("₱" + cartTotal);
                        $('#final_total').text("₱" + response.grand_cart_total);
                        toastr.success(response.message);

                        if (response.cartCount === 0) {
                            $('#voucher_select').val('');
                            $('#discount').text('₱ 0');
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage)
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }

            // ============== Remove All Product  ===============//
            $('.clear_all').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure to Delete All Items?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        removeAllCartProduct();
                        $('.cart-item-list').remove();
                    }
                });
            })

            function removeAllCartProduct() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.destroy') }}",
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        cartTotal = response.cartTotal;
                        $('#subtotal').text("₱" + cartTotal);
                        $('#final_total').text("₱" + response.grand_cart_total);
                        toastr.success(response.message);

                        if (response.cartCount === 0) {
                            $('#voucher_select').val('');
                            $('#discount').text('₱ 0');
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage)
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }

            //========== Payment with PayPal =========== //
            $('.payment-method').on('click', function(e) {
                e.preventDefault();
                if ('{{ Cart::content()->count() === 0 }}') {
                    toastr.warning('Cart is empty!');
                    return;
                }
                let paymentGateway = $(this).data('name');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('make-payment') }}",
                    data: {
                        payment_gateway: paymentGateway
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                    },
                    complete: function() {
                        // hideLoader();
                    }
                })
            });
        })

        // ポイント決済

        $(document).ready(function() {
            $('#confirmPayWithPoints').on('click', function() {
                var cartTotal = {{ cartTotal() }};
                var pointBalance = {{ Auth::user()->points->point_balance ?? 0 }};

                if (pointBalance < cartTotal) {
                    // ポイントが足りない場合、エラーメッセージを表示
                    $('#pointErrorMessage').show();
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: "{{ route('point.payment') }}", // ルート名を指定
                    data: {
                        _token: "{{ csrf_token() }}",
                        total: cartTotal
                    },
                    success: function(response) {
                        if (response.success) {
                            // 成功した場合、successページにリダイレクト
                            window.location.href = "{{ route('payment.success') }}";
                        } else {
                            alert(response.message); // エラーメッセージを表示
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        window.location.href = "{{ route('payment.cancel') }}";
                    }
                });

            });
        });
    </script>
@endpush
