<div class="modal fade" id="pointCheckoutModal" tabindex="-1" aria-labelledby="pointCheckoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="pointCheckoutModalLabel">Pay with Points</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fs-5">
              
              <p>Your total cart value : <strong class="text-danger">₱ {{ cartTotal() }}</strong></p>
              <p>You have <strong class="text-danger">₱{{ Auth::user()->points->point_balance ?? 0 }}</strong> points available.</p>
              <p>Would you like to use your points to pay for this order?</p>

              <!-- エラーメッセージや不足ポイントの表示用 -->
              <div id="pointErrorMessage" class="text-danger" style="display:none;">
                  Not enough points to complete this transaction.
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmPayWithPoints">Confirm Payment</button>
          </div>
      </div>
  </div>
</div>
