<div class="tab-pane fade" id="v-pills-proceed" role="tabpanel" aria-labelledby="v-pills-proceed-tab">
    <div class="fp_dashboard_body">

        <div class="row justify-content-center">

            <div class="tab-pane fade col-10 show active" id="v-pills-category-1" role="tabpanel"
                aria-labelledby="v-pills-category-tab1">
                <div class="fp_dashboard_body row palanquin-dark-regular">

                    <div class="col-md-6 col-sm-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title palanquin-dark-regular">Customer 1</h5>
                                <span>
                                    <div class="timer-container">
                                        <div class="time-display">00:00.000</div>
                                        <div class="buttons" class="text-center mt-2">
                                            <input type="button" value="start"
                                                class="start btn w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="stop"
                                                class="stop btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="reset"
                                                class="reset btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                            @include('admin.proceeds.modal.status')
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <table class="table table-hover text-center">

                                {{-- @foreach ($orders as $order) --}}
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}

                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title palanquin-dark-regular">Customer 2</h5>
                                <span>
                                    <div class="timer-container">
                                        <div class="time-display">00:00.000</div>
                                        <div class="buttons" class="text-center mt-2">
                                            <input type="button" value="start"
                                                class="start btn w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="stop"
                                                class="stop btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="reset"
                                                class="reset btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <table class="table table-hover text-center">

                                {{-- @foreach ($orders as $order) --}}
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}

                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title palanquin-dark-regular">Customer 3</h5>
                                <span>
                                    <div class="timer-container">
                                        <div class="time-display">00:00.000</div>
                                        <div class="buttons" class="text-center mt-2">
                                            <input type="button" value="start"
                                                class="start btn w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="stop"
                                                class="stop btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <input type="button" value="reset"
                                                class="reset btn btn-secondary w-auto btn-sm text-white"
                                                style="background-color: gray !important">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-red-black ms-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <table class="table table-hover text-center">

                                {{-- @foreach ($orders as $order) --}}
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}

                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="align-middle"> Pizza</td>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">
                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script src="{{ asset('admin/js/proceed_style.js') }}"></script>
@endpush
