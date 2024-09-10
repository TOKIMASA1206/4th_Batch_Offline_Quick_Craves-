<div class="tab-pane fade show active" id="v-pills-home-1" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="fp_dashboard_body ps-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-utensils h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
                                <h4>MENU</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-danger">
                            <i class="fa-solid fa-star h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
                                <h4>Category</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-warning">
                            <i class="fa-solid fa-users h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
                                <h4>User</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-100 mt-5">
            <div class="d-flex justify-content-end mb-4">
                <button onclick="updateChart('week')" class="btn-blue me-2">week</button>
                <button onclick="updateChart('month')" class="btn-blue me-2">month</button>
                <button onclick="updateChart('year')" class="btn-blue me-4">year</button>
            </div>
            <canvas id="salesChart" width="400" height="200"></canvas>
            <script src="script.js"></script>
        </div>
    </div>
</div>


@push('scripts')
    <script src="{{ asset('admin/js/statistics_style.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@endpush

