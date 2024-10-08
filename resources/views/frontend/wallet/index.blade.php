@extends('frontend.layouts.app')

@section('page-title')
    <h1 class="banner_title ar">Your Balance & Transactions</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Wallet</span></span>
@endsection


@section('content')
    <div class="container col-lg-6 col-md-8 col-12">
        <div class="d-flex flex-column flex-md-row gap-3 gap-md-5 mb-4 fade-in">
            <div class="w-100">
                <h2 class="h1 mb-3 ar text-center text-md-start">Crave Point(CP)</h2>
                <div class="text-center d-flex justify-content-center gap-3 align-items-center rounded-pill px-5 py-2"
                    style="border: 2px solid #FFB11B;">
                    @if (Auth::user()->points)
                        <h4 class="points" id="points">
                            {{ Auth::user()->points->point_balance }} Cp
                        </h4>
                    @else
                        <h4 class="points" id="points">
                            0 Cp
                        </h4>
                    @endif
                    <button class="btn btn-outline-warning ml-3" id="add-points" data-bs-toggle="modal"
                        data-bs-target="#pointChargeModal"><i class="fas fa-plus"></i></button>
                </div>
            </div>

            <div class="text-center d-flex justify-content-center">
                <button class="voucher-btn" data-bs-toggle="modal" data-bs-target="#vouchersRewardsModal">Vouchers &
                    Rewards</button>
            </div>
        </div>

        <div class="stamps row m-0 fade-in">
            <div class="col-12 col-xl-4 text-center text-md-start mb-3 mb-md-0">
                <p>{{ $stampCount }} Stamps Earned</p>
                <button class="view-rewards-btn" data-bs-toggle="modal" data-bs-target="#vouchersRewardsModal">
                    View Rewards
                </button>
            </div>
            <div class="col-12 col-xl-8 stamp-bar-section">
                <h4 class="text-end text-white mb-3">{{ $stampCount }}/{{ $totalStamps }}</h4>
                <div class="stamp-bar d-flex justify-content-between">
                    @for ($i = 1; $i <= $totalStamps; $i++)
                        <div class="stamp-box @if ($i <= $stampCount) completed @endif"></div>
                    @endfor
                </div>
            </div>
        </div>

        @php
            use Carbon\Carbon;
        @endphp
        <h4 class="mt-5 ar h1 fade-in">Transactions</h4>
        <div class="transactions mt-3">
            @foreach ($paginatedTransactions as $tr)
                @if ($tr['type'] === 'stamp')
                    {{-- STAMP トランザクション --}}
                    <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <p class="m-0 transaction-subtitle">{{ $tr['payment_status'] }}</p>
                            <p class="mb-0 transaction-title">STAMP</p>
                            <small>{{ Carbon::parse($tr['payment_approve_date'])->format('F d, Y, g:i A') }}</small>
                        </div>
                        <div class="me-5 transaction-status">
                            <p class="m-0">{{ $tr['stamps'] }} STAMP{{ $tr['stamps'] > 1 ? 'S' : '' }}</p>
                        </div>
                    </div>
                @elseif ($tr['type'] === 'payment')
                    {{-- PAY WITH [PAYMENT_METHOD] トランザクション --}}
                    <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <p class="m-0 transaction-subtitle">{{ $tr['payment_status'] }}</p>
                            <p class="mb-0 transaction-title">PAY WITH {{ strtoupper($tr['payment_method']) }}</p>
                            <small>{{ Carbon::parse($tr['payment_approve_date'])->format('F d, Y, g:i A') }}</small>
                        </div>
                        <div class="me-5 transaction-status">
                            <p class="m-0">{{ number_format($tr['grand_total'], 2) }} {{ $tr['currency_name'] }}</p>
                        </div>
                    </div>
                @elseif ($tr['type'] === 'voucher')
                    {{-- VOUCHER トランザクション --}}
                    <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <p class="m-0 transaction-subtitle">{{ $tr['payment_status'] }}</p>
                            <p class="mb-0 transaction-title">VOUCHER</p>
                            <small>{{ Carbon::parse($tr['created_at'])->format('F d, Y, g:i A') }}</small>
                        </div>
                        <div class="me-5 transaction-status">
                            <p class="m-0">{{ $tr['voucher_name'] }}</p>
                        </div>
                    </div>
                @elseif ($tr['type'] === 'point_purchase')
                    {{-- POINT PURCHASE トランザクション --}}
                    <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <p class="m-0 transaction-subtitle">{{ $tr['payment_status'] }}</p>
                            <p class="mb-0 transaction-title">POINT PURCHASE</p>
                            <small>{{ Carbon::parse($tr['payment_approve_date'])->format('F d, Y, g:i A') }}</small>
                        </div>
                        <div class="me-5 transaction-status">
                            <p class="m-0"> {{ number_format($tr['points_received']) }} CP</p>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="fade-in tr-paginate">
                {{ $paginatedTransactions->links() }}
            </div>
        </div>
    </div>

    @include('frontend.wallet.modals.add')
    @include('frontend.wallet.modals.edit')
    @include('frontend.wallet.modals.delete')
    @include('frontend.wallet.modals.point-charge')
    @include('frontend.wallet.modals.voucher-modal')
@endsection

@push('scripts')
    <script>
        // Toggle Card Info
        function toggleCardInfo() {
            const cardInfoContent = document.getElementById('w_card_info_content');
            const cardInfoTriangle = document.getElementById('card_info_triangle');

            if (cardInfoContent.classList.contains("expanded")) {
                cardInfoContent.classList.remove("expanded");
                cardInfoTriangle.classList.remove("rotated");
            } else {
                cardInfoContent.classList.add("expanded");
                cardInfoTriangle.classList.add("rotated");
            }
        }

        $(document).ready(function() {
            $('.unique-charge-option-item button').click(function() {
                $('.unique-charge-option-item button').removeClass('active');

                $(this).addClass('active');
            });

            // チャージボタンがクリックされたときにAjaxで支払いを処理
            $('#uniqueChargeButton').on('click', function(e) {
                e.preventDefault();
                let selectedPointId = $('#selected_point_id').val();
                let paymentGateway = 'paypal'; // PayPal支払いを指定

                if (!selectedPointId) {
                    alert('Please select a charge amount.');
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: "{{ route('make-point-payment') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        selected_point_id: selectedPointId,
                        payment_gateway: paymentGateway
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        if (response.redirect_url) {

                            window.location.href = response.redirect_url;
                        } else {
                            alert('Error in processing the payment.');
                        }
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            alert(value);
                        });
                    },
                    complete: function() {
                        // hideLoader();
                    }
                });
            });
        });

        function selectPoint(pointId) {
            $('#selected_point_id').val(pointId);
        }
    </script>
@endpush
