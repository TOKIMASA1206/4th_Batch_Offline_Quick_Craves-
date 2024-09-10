<div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
    <div class="fp_dashboard_body ps-4">
        <ul class="navbar-nav mx-auto mb-4 w-25">
            <form action="{{-- route('admin.search') --}}">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search for names">
            </form>
        </ul>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Customers</h4>
                        <div class="card-header-action">
                            <button class="btn btn-sm d-flex justify-content-end text-white"
                                style="box-shadow: 0 2px 6px #c5c0f2; background-color:#6777EF;">View More</button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Activation</th>
                                </tr>
                                <tr>
                                    <td><a href="#">No.87239</a></td>
                                    <td class="font-weight-600">Kusnadi</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 19, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inactivate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            inactivate
                                        </button>
                                        @include('admin.users.modal.status')
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.48574</a></td>
                                    <td class="font-weight-600">Hasan Basri</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 21, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-primary ms-2 btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#activate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            Activate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.76824</a></td>
                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-primary ms-2 btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#activate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            Activate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.84990</a></td>
                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-primary ms-2 btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#activate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            Activate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inactivate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            inactivate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inactivate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            inactivate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inactivate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            inactivate
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">No.87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inactivate-user-{{-- $post->id --}}">
                                            {{-- <i class="fa-regular fa-trash-can"></i> --}}
                                            inactivate
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                {{-- <div class="container"> --}}
                <canvas id="genderChart" ></canvas>
            </div>
            <div class="col-7">
                {{-- </div> --}}
                <canvas id="ageChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('admin/js/user_style.js') }}"></script>
@endpush
