@extends('frontend.layouts.app')

@section('title', 'Proceed')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/proceed_style.css') }}">
@endsection

@section('page-title')
    <h1 class="banner_title ar">Your Order & Checkout</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Proceed</span></span>
@endsection


@section('content')

    <div class="container fade-in">
        @foreach ($orders as $order)
        <div class="row mb-3">
            <h3 style="margin-left: 60px">Transaction ID: {{ $order->transaction_id }}</h3>
            <div class="col-lg-8">
                    <div class="proceed">
                        @foreach ($order->orderItems as $orderItem)
                            <div class="row proceed-item mx-auto mb-4">
                                <div class="col-md-3 left text-center">
                                    <div class="proceed-img-container mb-2">
                                        <img src="{{ asset($orderItem->menuItem->item_image) }}" class="proceed-img"
                                            alt="Burger">
                                    </div>
                                    <h5 class="m-0 text-uppercase proceed-item-title">{{ $orderItem->menuItem->name }}</h5>
                                </div>

                                <div class="col right">
                                    <p class="">Ordered Time: {{ date('F, j  g:ia', strtotime($order->created_at)) }}
                                    </p>
                                    <div class="proceed-status d-flex">
                                        <i class="fa-solid fa-circle start-mark"></i>
                                        <div class="status-bar bar-making">
                                            <div class="status-bar-color-1"></div>
                                        </div>
                                        <i class="fa-regular fa-circle-dot making-mark-first"></i>
                                        <i class="fa-solid fa-circle making-mark-second"></i>
                                        <div class="status-bar">
                                            <div class="status-bar-color-2"></div>
                                        </div>
                                        <i class="fa-regular fa-circle-dot completed-mark-first"></i>
                                        <i class="fa-solid fa-circle-check completed-mark-second"></i>
                                    </div>
                                    <div class="status-texts">
                                        <span class="start">start</span>
                                        <span class="making ms-4">making</span>
                                        <span class="completed">completed</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="invoice">
                        <h3 class="mb-4 fw-bold">Order Detail</h3>
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
                                        @foreach ($order->orderItems as $orderItem)
                                            @php
                                                $size = json_decode($orderItem->menu_item_size);
                                                $options = json_decode($orderItem->menu_item_option);

                                                $qty = $orderItem->qty;
                                                $unitPrice = $orderItem->unit_price;
                                                $sizePrice = $size->price ?? 0;

                                                $optionPrice = 0;
                                                foreach ($options as $optionItem) {
                                                    $optionPrice += $optionItem->price;
                                                }

                                                $productTotal = ($unitPrice + $sizePrice + $optionPrice) * $qty;
                                            @endphp
                                            <tr>
                                                <td class="sl_no">{{ ++$loop->index }}</td>
                                                <td class="package">
                                                    <p>{{ $orderItem->menuItem->name }}</p>
                                                    <span class="size">
                                                        {{ @$size->name }}
                                                        {{ @$size->price ? '( +₱' . @$size->price . ')' : '' }}
                                                    </span>
                                                    <br>

                                                    @foreach (@$options as $option)
                                                        <span class="coca_cola">
                                                            {{ @$option->name }}
                                                            {{ @$option->price ? '( +₱' . @$option->price . ')' : '' }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="price">
                                                    <b>{{ $orderItem->unit_price }}</b>
                                                </td>
                                                <td class="qnty">
                                                    <b>{{ $orderItem->qty }}</b>
                                                </td>
                                                <td class="total">
                                                    <b>₱ {{ $productTotal }}</b>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td class="package" colspan="2">
                                                <b>sub total</b>
                                            </td>
                                            <td class="qnty">
                                                <b>{{ $order->product_qty }}</b>
                                            </td>
                                            <td class="total">
                                                <b>₱ {{ $order->subtotal }}</b>
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
                                                @if ($order->discount > 0)
                                                    <b>₱ {{ $order->discount }}</b>
                                                @else
                                                    <b>₱ 0</b>
                                                @endif
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
                                                <b>₱ {{ $order->grand_total }}</b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('frontend/js/proceed_js_action.js') }}"></script>
@endpush
