<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="personal-info card-bg py-4 px-5">
        <button id="edit-btn" class="info-edit-btn btn-yellow-black float-end m-0">Edit</button>
        <button id="cancel-btn" class="info-cancel-btn btn-yellow-black float-end m-0">Cancel</button>
        <h3 class="menu-section-title mb-4 mt-2">
            Personal Info
        </h3>
        <div id="info-content" class="menu-section-content">
            <div class="row mb-3">
                <div class="col">Name:</div>
                <div class="col">{{ @Auth::user()->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col">Email:</div>
                <div class="col">{{ @Auth::user()->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col">Phone Number:</div>
                <div class="col">
                    @if (@Auth::user()->profile->phone)
                        {{ @Auth::user()->profile->phone }}
                    @else
                        Not set yet.
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">Gender:</div>
                <div class="col">
                    @if (@Auth::user()->profile->gender)
                        {{ @Auth::user()->profile->gender }}
                    @else
                        Not set yet.
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">Age:</div>
                <div class="col">
                    @if (@Auth::user()->profile->age)
                        {{ @Auth::user()->profile->age }}
                    @else
                        Not set yet.
                    @endif
                </div>
            </div>
        </div>
        <form action="{{ route('profile_update') }}" method="post" id="edit-form" class="edit-form text-center px-3"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <label for="name" class="form-label fw-bold text-start p-0">Profile Image</label>
                <img src="{{ asset(@Auth::user()->profile->avatar) }}" class="mb-3" alt=""
                    style="max-width: 400px">

                <input type="file" id="name" name="avatar" value="" class="form-control">
            </div>
            <div class="row mb-3">
                <label for="name" class="form-label fw-bold text-start p-0">Name</label>
                <input type="text" id="name" name="name" value="{{ @Auth::user()->name }}"
                    class="form-control">
            </div>
            <div class="row mb-3">
                <label for="email" class="form-label fw-bold text-start p-0">Email</label>
                <input type="text" id="email" name="email" value="{{ @Auth::user()->email }}"
                    class="form-control">
            </div>
            <div class="row mb-3">
                <label for="phone" class="form-label fw-bold text-start p-0">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ @Auth::user()->profile->phone }}"
                    class="form-control">
            </div>

            <div class="row mb-4">
                <div class="col text-start p-0">
                    <label for="gender" class="form-label fw-bold text-start p-0">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="male"
                            {{ old('gender', @Auth::user()->profile->gender) == 'male' ? 'selected' : '' }}>
                            Male</option>
                        <option
                            value="female"{{ old('gender', @Auth::user()->profile->gender) == 'female' ? 'selected' : '' }}>
                            Female</option>
                        <option value="other"
                            {{ old('gender', @Auth::user()->profile->gender) == 'other' ? 'selected' : '' }}>
                            Other</option>
                    </select>
                </div>
                <div class="col text-start">
                    <label for="age" class="form-label fw-bold text-start p-0">Age</label>
                    <input type="number" id="age" name="age" class="form-control"
                        value="{{ old('age', @Auth::user()->profile->age) }}">
                </div>
            </div>
            <button type="submit" class="edit-form-save btn-brown mx-auto">Save</button>
        </form>
    </div>
</div>

