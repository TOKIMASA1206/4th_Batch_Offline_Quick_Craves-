@extends('frontend.layouts.app')

@section('title', 'Proceed')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/proceed_style.css') }}">
@endsection

@section('page-title')
    <div class="row justify-content-center align-items-center" style="height: 100%">
        <div class="text-center">
            <h1 class="display-4 ar" style="color: #FFB11B;">Proceed</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="proceed">
            <div class="row proceed-item mx-auto mb-4">
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
            <div class="row proceed-item mx-auto mb-4">
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
            <div class="row proceed-item mx-auto mb-4">
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
            <div class="row proceed-item mx-auto mb-4">
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
            <div class="row proceed-item mx-auto mb-4">
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
            <div class="row proceed-item mx-auto mb-4"md->
                <div class="col-md-3 left text-center">
                    <div class="proceed-img-container mb-2">
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="proceed-img" alt="Burger">
                    </div>
                    <h5 class="m-0 text-uppercase proceed-item-title">Hamburger</h5>
                </div>

                <div class="col right">
                    <p class="">Ordered Time: August, 10 1:30pm</p>
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
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('frontend/js/proceed_js_action.js') }}"></script>
@endpush
