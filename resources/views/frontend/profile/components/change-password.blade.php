<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <div class="change-password card-bg  py-4 px-5">
        <h3 class="menu-section-title mb-4 mt-2">Change Password</h3>
        <form action="{{ route('profile_password_update') }}" method="post"
            class="change-password-content text-center px-3">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <label for="current_password" class="form-label fw-bold text-start p-0">Current Password</label>
                <input type="text" id="current_password" name="current_password" class="form-control"
                    placeholder="current_password">
            </div>
            <div class="row mb-3">
                <label for="new_password" class="form-label fw-bold text-start p-0">New password</label>
                <input type="text" id="new_password" name="new_password" class="form-control"
                    placeholder="new_password">
            </div>
            <div class="row mb-5">
                <label for="new_password_confirmation" class="form-label fw-bold text-start p-0">Confirm
                    Password</label>
                <input type="text" id="new_password_confirmation" name="new_password_confirmation"
                    class="form-control" placeholder="comfirm_password">
            </div>
            <button type="submit" class="password-save btn-brown mx-auto">Submit</button>
        </form>
    </div>
</div>
