<div class="modal fade" id="vouchersRewardsModal" tabindex="-1" aria-labelledby="vouchersRewardsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="v_modal_content">
            <div class="modal-header mb-2">
                <h5 class="modal-title h2" id="vouchersRewardsModalLabel">Vouchers and Rewards</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-2">
                <ul class="nav nav-tabs text-center" id="v_myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="vouchers-tab" data-bs-toggle="tab"
                            data-bs-target="#vouchers" type="button" role="tab" aria-controls="vouchers"
                            aria-selected="true">Vouchers</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="vouchers" role="tabpanel"
                        aria-labelledby="vouchers-tab">
                        @foreach (Auth::user()->vouchers as $voucher)
                        <div class="voucher-item">
                            <div class="voucher-icon">
                                <img src="{{ asset('frontend/images/ticket.png') }}" alt="Ticket Icon">
                            </div>
                            <div class="voucher-details">
                                <p class="voucher-title">{{$voucher->name}}</p>
                                @if($voucher->expiry_date)
                                <p class="voucher-expiry">expiry_date：{{$voucher->expiry_date}}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
