<div class="modal fade palanquin-dark-regular" tabindex="-1" id="delete-proceed-{{ $order->id }}">
    <form action="{{  route('admin.proceed.update', $order->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-danger fw-bold mx-auto">Delete Proceed</h2>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to <span class="text-danger">Delete</span> " Order Number {{ $order->id }} " ?</p>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="button" class=" btn btn-outline-danger w-100 fw-bold"
                                data-bs-dismiss="modal"><span>Close</span></button>
                        </div>
                        <div class="col">
                            <button type="submit" class=" btn btn-danger w-100 fw-bold">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
