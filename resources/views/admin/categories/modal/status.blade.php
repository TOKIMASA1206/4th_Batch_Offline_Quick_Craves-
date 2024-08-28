{{-- Edit --}}
<div class="modal fade palanquin-dark-regular" tabindex="-1" id="edit-category-{{-- $category->id --}}">
    <div class="modal-dialog">
      <div class="modal-content"  style="background-color: rgb(199, 199, 245) !important">
        <div class="modal-header">
          <h5 class="modal-title" style="color: rgb(81, 51, 179)">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control w-75 mx-auto" placeholder="Category">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)"><span style="color: rgb(81, 51, 179)">Close</span></button>
          <button type="button" class="btn text-white" style="background-color: rgb(81, 51, 179)">Edit</button>
        </div>
      </div>
    </div>
</div>


{{-- Delete --}}
<div class="modal fade palanquin-dark-regular" tabindex="-1" id="delete-category-{{-- $category->id --}}">
    <div class="modal-dialog">
      <div class="modal-content"  style="background-color: rgb(199, 199, 245) !important">
        <div class="modal-header">
          <h5 class="modal-title" style="color: rgb(81, 51, 179)">Delete Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to <span class="text-danger">Delete</span> " ######## " ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)"><span style="color: rgb(81, 51, 179)">Close</span></button>
          <button type="button" class="btn text-white" style="background-color: rgb(81, 51, 179)">Delete</button>
        </div>
      </div>
    </div>
</div>
