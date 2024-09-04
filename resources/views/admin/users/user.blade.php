<div class="tab-pane fade" id="v-pills-user" role="tabpanel"
aria-labelledby="v-pills-user-tab">
<div class="fp_dashboard_body ps-4">
    <ul class="navbar-nav ms-auto mb-2 w-25">
        <form action="{{-- route('admin.search') --}}">
            <input type="text" name="search"
                class="form-control form-control-sm"
                placeholder="Search for names">
        </form>
    </ul>
    <table
        class="table table-hover align-middle border palanquin-dark-regular mx-auto">
        <thead class="small">
            <tr>
                <th class="th-bg text-center ">#</th>text-center
                <th class="th-bg">Name</th>
                <th class="th-bg">Email</th>
                <th class="th-bg">Phone Number</th>
                <th class="th-bg">Number of Order</th>
                <th class="th-bg">Total Price</th>
                <th class="th-bg"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">55</td>
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
                <td class="text-center">55</td>
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
