{{-- Add --}}
<div class="modal fade" id="add-category-{{-- $category->id --}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white" style="width: 700px !important">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="{{-- route('profile.update') --}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h2 class="h3 mb-3 amarante-regular text-center">Add Menu</h2>

                        <div class="row mb-3">
                            <div class="col-6">
                                <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div id="avatar-info" class="form-text">
                                    Acceptable format: jpeg, jpg, png, gif only <br>
                                    Max file size is 1048kB
                                </div>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" id="name" class="form-control" autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">E-Mail Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                            {{-- @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="introduction" class="form-label fw-bold">Introduction</label>
                           <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Describe yourself"></textarea>

                        </div>

                        <button type="submit" class="btn btn-warning px-5">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Edit --}}
<div class="modal fade" id="edit-category-{{-- $category->id --}}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h5 modal-title text-warning">
                    <i class="fa-solid fa-pen"></i> Edit Menu
                </h3>
            </div>
            <form action="{{-- route('admin.categories.update',$category->id) --}}" method="POST" >
                @csrf
                @method('PATCH')
                <div class="d-flex justify-content-center modal-body">
                    <div class="input-group mb-3 mt-4 w-75">
                        <input type="text" name="category" class="form-control" value="{{-- $category->name --}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-warning" type="submit" id="button-addon2">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete --}}
<div class="modal fade" id="delete-category-{{-- $category->id --}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-trash"></i> Delete Category
                </h3>
            </div>
            <form action="{{-- route('admin.categories.destroy',$category->id) --}}" method="POST" >
                @csrf
                @method('DELETE')

                       <h4 class="text-center mt-4">Are you sure delete "{{-- $category->name --}}"?</h4>

                <div class="text-center mt-3 mb-3">
                    <button class="btn btn-outline-danger rounded form-control w-50" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Deactivate --}}
<div class="modal fade" id="deactivate-post-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content border-secondary">
            <div class="modal-header border-secondary">
                <h3 class="h5 modal-title text-secondary">
                    <i class="fa-solid fa-eye-slash"></i> Hide Post
                </h3>
            </div>

            <div class="modal-body">
                <img src="{{-- $post->image --}}" alt="{{-- $post->description --}}" class="image-lg me-2">
                Are you sure you want to hide?
            </div>
            <p class="ms-3">{{-- $post->description --}}</p>


            <div class="modal-footer border-0">
                <form action="{{-- route('admin.posts.deactivate', $post->id) --}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>

                    <button type="submit" class="btn btn-secondary btn-sm">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{--  POST  --}}

<div class="modal fade" id="activate-post-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h3 class="h5 modal-title text-primary">
                    <i class="fa-solid fa-eye text-primary"></i> Visible Menu
                </h3>
            </div>

            <div class="modal-body">
                <img src="{{-- $post->image --}}" alt="{{-- $post->description --}}" class="image-lg me-2">
                Are you sure you want to Activate <span class="fw-bold"></span>?
            </div>
            <p class="ms-3">{{-- $post->description --}}</p>

            <div class="modal-footer border-0">
                <form action="{{-- route('admin.posts.activate',$post->id) --}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Cancel</button>

                    <button type="submit" class="btn btn-primary btn-sm">Visible</button>
                </form>
            </div>
        </div>
    </div>
</div>
