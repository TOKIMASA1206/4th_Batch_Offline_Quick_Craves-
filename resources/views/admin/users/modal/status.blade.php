{{-- Deactivate --}}

<div class="modal fade palanquin-dark-regular" tabindex="-1" id="inactivate-user-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-danger fw-bold mx-auto">Inactivate User</h2>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to <span class="text-danger">inactivate</span> " ######## " ?
                </p>
                <div class="row mt-3">
                    <div class="col">
                        <button type="button" class=" btn btn-outline-danger w-100 fw-bold"
                            data-bs-dismiss="modal"><span>Close</span></button>
                    </div>
                    <div class="col">
                        <button type="button" class=" btn btn-danger w-100 fw-bold">Inactivate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--  Activate  --}}

<div class="modal fade palanquin-dark-regular" tabindex="-1" id="activate-user-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-primary fw-bold mx-auto">activate User</h2>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to <span class="text-primary">activate</span> " ######## "
                    ?
                </p>
                <div class="row mt-3">
                    <div class="col">
                        <button type="button" class=" btn btn-outline-primary w-100 fw-bold"
                            data-bs-dismiss="modal"><span>Close</span></button>
                    </div>
                    <div class="col">
                        <button type="button" class=" btn btn-primary w-100 fw-bold">activate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
