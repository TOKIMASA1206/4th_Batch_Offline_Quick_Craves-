<div class="modal fade" id="pointChargeModal" tabindex="-1" aria-labelledby="pointChargeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="unique-current-point mb-3">
                    <p class="unique-current-point-text mb-2">YOUR CURRENT POINT</p>
                    <div class="unique-current-point-display text-center py-2">
                        @if (Auth::user()->points)
                            <h3>
                                {{ Auth::user()->points->point_balance }} Cp
                            </h3>
                        @else
                            <h3>
                                0 Cp
                            </h3>
                        @endif
                    </div>
                </div>

                <p class="unique-current-point-text">SELECT CHRAGE AMOUNT</p>
                <form action="{{ route('wallet.point.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="selected_point_id" id="selected_point_id">

                    <ul class="unique-charge-options-list mt-1 mb-4">
                        @foreach ($points as $point)
                            <li class="unique-charge-option-item">
                                <input type="hidden" value="{{ $point->id }}">

                                <button type="button" id="charge-option-{{ $point->purchase_amount }}"
                                    onclick="selectPoint('{{ $point->id }}')">
                                    Charge {{ $point->purchase_amount }} + {{ $point->bonus_points }} free CP (
                                    @if ($point->bonus_points == $point->purchase_amount)
                                        Amazing Price
                                    @else
                                        {{ ($point->bonus_points / $point->purchase_amount) * 100 }}% off on your app
                                        orders
                                    @endif
                                    )
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="unique-modal-footer gap-3">
                        <button type="button" class="unique-modal-button unique-cancel-button w-100"
                            id="uniqueCancelButton" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="unique-modal-button unique-charge-button w-100"
                            id="uniqueChargeButton">Charge</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.unique-charge-option-item button').click(function() {
                // Remove the 'active' class from all buttons
                $('.unique-charge-option-item button').removeClass('active');

                // Add the 'active' class to the clicked button
                $(this).addClass('active');
            });
        });


        // 選択されたポイントのIDを hidden input にセットする関数
        function selectPoint(pointId) {
            document.getElementById('selected_point_id').value = pointId;
        }
    </script>
@endpush
