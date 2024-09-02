<div class="modal fade" id="cardAddModal" tabindex="-1" aria-labelledby="cardAddModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h2 class="card-modal-title display-6" id="cardAddModalTitle">Card Add</h2>
                    <hr>
                </div>

                <img src="{{ asset('frontend/images/card_5brand.png') }}" class="mb-4" alt="Card Image" style="width:100%;">

                <form action="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="number" class="form-label fw-bold mb-0 ms-1">Card Number</label>
                            <input type="text" name="number" id="number" class="form-control"
                                placeholder="1234 5678 9012 3456">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="due_date" class="form-label fw-bold mb-0 ms-1">Due Date</label>
                            <input type="text" name="due_date" id="due_date" class="form-control"
                                placeholder="MM/YY">
                        </div>
                        <div class="col">
                            <label for="security_code" class="form-label fw-bold mb-0 ms-1">Security Code</label>
                            <input type="text" name="security_code" id="security_code" class="form-control"
                                placeholder="123">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="name" class="form-label fw-bold mb-0 ms-1">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="John Doe">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <button type="button" class="btn-brown-outline w-100"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn-brown w-100">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
