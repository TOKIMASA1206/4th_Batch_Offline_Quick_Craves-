{{-- Add --}}
<div class="modal fade palanquin-dark-regular" id="add-category-{{-- $category->id --}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: rgb(199, 199, 245) !important ">
            {{-- サイズ変えたい --}}
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="{{-- route('profile.update') --}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h2 class="h3 mb-3 amarante-regular text-center">Add Menu</h2>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                <div id="avatar-info" class="form-text">
                                    Acceptable format: jpeg, jpg, png, gif only <br>
                                    Max file size is 1048kB
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="name" autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <input type="number" name="price" id="price" class="form-control" placeholder="price" autofocus>
                            {{-- @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label fw-bold">Introduction</label>
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
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="size">
                                <label class="form-check-label mt-2 ms-2" for="size">Custom Menu( +size)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="option">
                                <label class="form-check-label  mt-2 ms-2" for="option">Custom Menu( +option)</label>
                            </div>
                        </div>

                        <div class="modal-footer border-0">
                            <form action="{{-- route('admin.posts.deactivate', $post->id) --}}" method="POST">
                                @csrf


                                <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)">
                                    <span class="text-dark">Cancel</span>
                                </button>

                                <button type="submit" class="btn" style="background-color: rgb(81, 51, 179)">
                                    <span class="text-white">+ Add</span>
                                </button>
                            </form>
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
            <div class="modal-content" style="background-color: rgb(199, 199, 245) !important ">
                {{-- サイズ変えたい --}}
                <div class="row justify-content-center">
                    <div class="col-8">
                        <form action="{{-- route('profile.update') --}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h2 class="h3 mb-3 amarante-regular text-center">Edit Menu</h2>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                                    <div id="avatar-info" class="form-text">
                                        Acceptable format: jpeg, jpg, png, gif only <br>
                                        Max file size is 1048kB
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="name" autofocus>
                                {{-- @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="mb-3">
                                <input type="number" name="price" id="price" class="form-control" placeholder="price" autofocus>
                                {{-- @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="mb-3">
                                <label for="introduction" class="form-label fw-bold">Introduction</label>
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
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="size">
                                    <label class="form-check-label mt-2 ms-2" for="size">Custom Menu( +size)</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="option">
                                    <label class="form-check-label  mt-2 ms-2" for="option">Custom Menu( +option)</label>
                                </div>
                            </div>

                            <div class="modal-footer border-0">
                                <form action="{{-- route('admin.posts.deactivate', $post->id) --}}" method="POST">
                                    @csrf


                                    <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)">
                                        <span class="text-dark">Cancel</span>
                                    </button>

                                    <button type="submit" class="btn" style="background-color: rgb(81, 51, 179)">
                                        <span class="text-white">+ Add</span>
                                    </button>
                                </form>
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
          <div class="modal-content" style="background-color: rgb(199, 199, 245) !important ">
            <div class="modal-header">
              <h5 class="modal-title" style="color: rgb(81, 51, 179)">Delete Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-dark">Are you sure you want to <span class="text-danger">Delete</span> " ######## " ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)"><span style="color: rgb(81, 51, 179)">Close</span></button>
              <button type="button" class="btn text-white" style="background-color: rgb(81, 51, 179)">Delete</button>
            </div>
          </div>
        </div>
    </div>


{{-- Deactivate --}}

    <div class="modal fade palanquin-dark-regular" tabindex="-1" id="inactivate-post-{{-- $post->id --}}">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color: rgb(199, 199, 245) !important ">
            <div class="modal-header">
              <h5 class="modal-title" style="color: rgb(81, 51, 179)">Inactivate Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-dark">Are you sure you want to <span class="text-danger">Inactivate</span> " ######## " ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)"><span style="color: rgb(81, 51, 179)">Close</span></button>
              <button type="button" class="btn text-white" style="background-color: rgb(81, 51, 179)">Inactivate</button>
            </div>
          </div>
        </div>
    </div>


{{--  Activate  --}}

<div class="modal fade palanquin-dark-regular" tabindex="-1" id="activate-post-{{-- $post->id --}}">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: rgb(199, 199, 245) !important ">
        <div class="modal-header">
          <h5 class="modal-title" style="color: rgb(81, 51, 179)">Activate Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-dark">Are you sure you want to <span class="text-success">Activate</span> " ######## " ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal" style="border-color:rgb(81, 51, 179)"><span style="color: rgb(81, 51, 179)">Close</span></button>
          <button type="button" class="btn text-white" style="background-color: rgb(81, 51, 179)">Activate</button>
        </div>
      </div>
    </div>
</div>
