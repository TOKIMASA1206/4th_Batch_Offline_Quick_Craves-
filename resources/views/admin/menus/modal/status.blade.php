{{-- Add --}}
<div class="modal fade palanquin-dark-regular" id="add-category-{{-- $category->id --}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- サイズ変えたい --}}
            <div class="row justify-content-center add-bg-color">
                <div class="col px-5 pb-4">
                    <form action="{{-- route('profile.update') --}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h2 class="modal-title modal-title fw-bold mx-auto">Add Menu</h2>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="avatar" class="form-label m-0 fw-bold">Image</label>
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div id="avatar-info" class="form-text small p-0 m-0">
                                    Acceptable format: jpeg, jpg, png, gif only <br>
                                    Max file size is 1048kB
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label m-0 fw-bold">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="name"
                                autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label m-0 fw-bold">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="price"
                                autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label m-0 fw-bold">Introduction</label>
                            <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch align-items-center">
                                <input class="form-check-input" type="checkbox" role="switch" id="size">
                                <label class="form-check-label ms-2" for="size">Custom Menu( +size)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch align-items-center">
                                <input class="form-check-input" type="checkbox" role="switch" id="option">
                                <label class="form-check-label ms-2" for="option">Custom Menu( +option)</label>
                            </div>
                        </div>

                        <div class="">
                            @csrf
                            <div class="row mt-3 w-100">
                                <div class="col">
                                    <button type="button" class="d-block w-100 btn-blue-outline fw-bold"
                                        data-bs-dismiss="modal"><span>Close</span></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="w-100 btn-blue fw-bold">ADD</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Edit --}}
<div class="modal fade palanquin-dark-regular" id="edit-menu-{{-- $category->id --}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- サイズ変えたい --}}
            <div class="row edit-bg-color">
                <div class="col  px-5 pb-4">
                    <form action="{{-- route('profile.update') --}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                            <h2 class="modal-title text-warning fw-bold mx-auto">Edit Menu</h2>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="avatar" class="form-label m-0 fw-bold">Image</label>
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div id="avatar-info" class="form-text small p-0 m-0">
                                    Acceptable format: jpeg, jpg, png, gif only <br>
                                    Max file size is 1048kB
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label m-0 fw-bold">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="name"
                                autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label m-0 fw-bold">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="price"
                                autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label m-0 fw-bold">Introduction</label>
                            <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch align-items-center">
                                <input class="form-check-input" type="checkbox" role="switch" id="size">
                                <label class="form-check-label ms-2" for="size">Custom Menu( +size)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch align-items-center">
                                <input class="form-check-input" type="checkbox" role="switch" id="option">
                                <label class="form-check-label ms-2" for="option">Custom Menu( +option)</label>
                            </div>
                        </div>

                        <div class="">
                            @csrf
                            <div class="row mt-3 w-100">
                                <div class="col">
                                    <button type="button" class=" btn-yellow-outline w-100 fw-bold"
                                        data-bs-dismiss="modal"><span>Close</span></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn-yellow w-100 fw-bold">Edit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete --}}
<div class="modal fade palanquin-dark-regular" tabindex="-1" id="delete-menu-{{-- $category->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-danger fw-bold mx-auto">Delete Menu</h2>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to <span class="text-danger">Delete</span> " ######## " ?</p>
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


{{-- Deactivate --}}

<div class="modal fade palanquin-dark-regular" tabindex="-1" id="inactivate-post-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-danger fw-bold mx-auto">Inactivate Menu</h2>
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

<div class="modal fade palanquin-dark-regular" tabindex="-1" id="activate-post-{{-- $post->id --}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success fw-bold mx-auto">activate Menu</h2>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to <span class="text-success">activate</span> " ######## "
                    ?
                </p>
                <div class="row mt-3">
                    <div class="col">
                        <button type="button" class=" btn btn-outline-success w-100 fw-bold"
                            data-bs-dismiss="modal"><span>Close</span></button>
                    </div>
                    <div class="col">
                        <button type="button" class=" btn btn-success w-100 fw-bold">activate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
