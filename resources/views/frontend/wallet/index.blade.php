@extends('frontend.layouts.app')

@section('page-title')
    <div class="row justify-content-center align-items-center" style="height: 100%">
        <div class="text-center">
            <h1 class="display-4 ar" style="color: #FFB11B;">Wallet</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container col-6 p-0">
        <div class="d-flex gap-5 mb-4 fade-in">
            <div>
                <h2 class="h1 mb-3 ar">Crave Point(CP)</h2>
                <div class="text-center d-flex justify-content-center gap-3 align-items-center rounded-pill px-5 py-2"
                    style="border: 2px solid #FFB11B;">
                    <h3 class="points" id="points">1,234.60 CP</h3>
                    <button class="btn btn-outline-warning ml-3" id="add-points"><i class="fas fa-plus"></i></button>
                </div>
            </div>

            <div class="text-center d-flex align-items-end">
                <button class="voucher-btn">Vouchers & Rewards</button>
            </div>
        </div>

        {{-- Card information --}}
        <div class="mb-5 wlt-card-info fade-in">
            <div class="my-2" id="w_card_info_title" onclick="toggleCardInfo()">
                <span id="card_info_triangle" class="card_info_triangle">►</span>
                Card Information
            </div>
            <div class="w-card-info-content" id="w_card_info_content">
                <div class="w-card-detail mb-3">
                    <div class="row align-items-center">
                        <div class="d-flex col-9">
                            <div class="me-4">
                                <img src="{{ asset('logos/visa-card-icon.jpg') }}" alt="Visa" class="w-card-img">
                            </div>
                            <div class="pt-4 text-secondary">
                                <h4>**** **** **** 5678</h4>
                                <h4>Due Date: 12/24</h4>
                            </div>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                                data-bs-target="#cardEditModal">Edit</button>
                            <button type="button" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"
                                    data-bs-toggle="modal" data-bs-target="#cardDeleteModal"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button" class="add-cardInfo-btn ps-5 text-decoration-none fs-5" data-bs-toggle="modal"
                        data-bs-target="#cardAddModal">
                        <i class="fas fa-plus"></i> Add Card Info
                    </button>
                </div>
            </div>
        </div>

        {{-- Stamp section --}}
        <div class="stamps row m-0 fade-in">
            <div class="col-3">
                <p>6 Stamps Earned</p>
                <button class="view-rewards-btn">View Rewards</button>
            </div>
            <div class="col-9">
                <h4 class="text-end text-white mb-3">6/10</h4>
                <div class="stamp-bar">
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box completed"></div>
                    <div class="stamp-box"></div>
                    <div class="stamp-box"></div>
                    <div class="stamp-box"></div>
                    <div class="stamp-box"></div>
                </div>
            </div>
        </div>

        <h4 class="mt-5 ar h1 fade-in">Transactions</h4>
        <div class="transactions mt-3">
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">STAMP</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">1 STAMP</P>
                </div>
            </div>
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">PAY WITH CRAVE POINTS</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">99.00 CP</P>
                </div>
            </div>
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">STAMP</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">1 STAMP</P>
                </div>
            </div>
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">PAY WITH CRAVE POINTS</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">99.00 CP</P>
                </div>
            </div>
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">STAMP</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">1 STAMP</P>
                </div>
            </div>
            <div class="transaction-item fade-in d-flex justify-content-between align-items-center px-4 py-3">
                <div>
                    <p class="m-0 transaction-subtitle">completed</p>
                    <p class="mb-0 transaction-title">PAY WITH CRAVE POINTS</p>
                    <small>August 10, 2024, 2:11 PM</small>
                </div>
                <div class="me-5 transaction-status">
                    <P class="m-0">99.00 CP</P>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.wallet.modals.add')
    @include('frontend.wallet.modals.edit')
    @include('frontend.wallet.modals.delete')
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
    </script>
@endpush
