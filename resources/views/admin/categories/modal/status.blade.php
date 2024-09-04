{{-- Edit --}}
<div class="modal fade palanquin-dark-regular" tabindex="-1" id="edit-category-{{-- $category->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-warning fw-bold mx-auto">Edit Category</h2>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control w-75 mx-auto my-4" placeholder="Category">
                <div class="row mt-3">
                    <div class="col">
                        <button type="button" class=" btn-yellow-outline w-100 fw-bold"
                            data-bs-dismiss="modal"><span>Close</span></button>
                    </div>
                    <div class="col">
                        <button type="button" class=" btn-yellow w-100 fw-bold">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Delete --}}
<div class="modal fade palanquin-dark-regular" tabindex="-1" id="delete-category-{{-- $category->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-danger fw-bold mx-auto">Delete Category</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to <span class="text-danger">Delete</span> " ######## " ?</p>
                <div class="row mt-3">
                    <div class="col">
                        <button type="button" class=" btn btn-outline-danger w-100 fw-bold"
                            data-bs-dismiss="modal"><span>Close</span></button>
                    </div>
                    <div class="col">
                        <button type="button" class=" btn btn-danger w-100 fw-bold">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
