<div class="tab-pane fade" id="v-pills-user" role="tabpanel"
aria-labelledby="v-pills-user-tab">
<div class="fp_dashboard_body">
    <ul class="navbar-nav ms-auto mb-2 w-25">
        <form action="{{-- route('admin.search') --}}">
            <input type="text" name="search"
                class="form-control form-control-sm"
                placeholder="Search for names">
        </form>
    </ul>
    <table
        class="table table-hover align-middle bg-white border text-secondary palanquin-dark-regular">
        <thead class="small text-secondary">
            <tr>
                <th style="color: rgb(52, 52, 117)">ID</th>
                <th style="color: rgb(52, 52, 117)">Name</th>
                <th style="color: rgb(52, 52, 117)">Email</th>
                <th style="color: rgb(52, 52, 117)">Phone Number</th>
                <th style="color: rgb(52, 52, 117)">Number of Order</th>
                <th style="color: rgb(52, 52, 117)">Total Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>55</td>
                <td>Hikaru</td>
                <td>hikaru.mail</td>
                <td>080-1234-5678</td>
                <td>20</td>
                <td>20000p</td>
                <td>
                    <div class="dropdown">
                        <button class="dropdown-item text-secondary"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>

                        <div class="dropdown-menu">
                            {{-- @if ($post->trashed())
                                    <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post{{ $post->id }}
                                    </button>
                                @else --}}
                            <button class="dropdown-item text-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#inactivate-user-{{-- $post->id --}}"><i
                                    class="fa-solid fa-eye-slash"></i> Inactivate
                                User
                            </button>
                            {{-- @endif --}}
                        </div>
                    </div>
                </td>
                @include('admin.users.modal.status')
            </tr>
            <tr>
                <td>55</td>
                <td>Hikaru</td>
                <td>hikaru.mail</td>
                <td>080-1234-5678</td>
                <td>20</td>
                <td>20000p</td>
                <td>
                    <div class="dropdown">
                        <button class="dropdown-item text-secondary"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>

                        <div class="dropdown-menu">
                            {{-- @if ($post->trashed())
                                <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#activate-post-{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post{{ $post->id }}
                                </button>
                            @else --}}
                            <button class="dropdown-item text-success"
                                data-bs-toggle="modal"
                                data-bs-target="#activate-user-{{-- $post->id --}}"><i
                                    class="fa-solid fa-eye"></i> Activate User
                            </button>
                            {{-- @endif --}}
                        </div>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
