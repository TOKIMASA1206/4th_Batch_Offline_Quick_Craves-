<div class="modal fade" id="pointChargeModal" tabindex="-1" aria-labelledby="pointChargeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="unique-current-point mb-3">
                    <p class="unique-current-point-text mb-2">YOUR CURRENT POINT</p>
                    <div class="unique-current-point-display text-center py-2">
                        <h3>1234.56 CP</h3>
                    </div>
                </div>

                <p class="unique-current-point-text">SELECT CHRAGE AMOUNT</p>
                <ul class="unique-charge-options-list mt-1 mb-4">
                    <li class="unique-charge-option-item">
                        <button type="button" id="charge-option-250" value="250">Charge 250 + 25
                            free CP (10% off on your app orders)</button>
                    </li>
                    <li class="unique-charge-option-item">
                        <button type="button" id="charge-option-500" value="500">Charge 500 + 100
                            free CP (20% off on your app orders)</button>
                    </li>
                    <li class="unique-charge-option-item">
                        <button type="button" id="charge-option-1000" value="1000">Charge 1000 + 300
                            free CP (30% off on your app orders)</button>
                    </li>
                    <li class="unique-charge-option-item">
                        <button type="button" id="charge-option-2000" value="2000">Charge 2000 + 800
                            free CP (40% off on your app orders)</button>
                    </li>
                    <li class="unique-charge-option-item">
                        <button type="button" id="charge-option-5000" value="5000">Charge 5000 + 5000
                            free CP (50% off on your app orders)</button>
                    </li>
                </ul>

                <div class="unique-modal-footer gap-3">
                    <button type="button" class="unique-modal-button unique-cancel-button w-100"
                        id="uniqueCancelButton" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="unique-modal-button unique-charge-button w-100"
                        id="uniqueChargeButton">Charge</button>
                </div>
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
    </script>
@endpush
