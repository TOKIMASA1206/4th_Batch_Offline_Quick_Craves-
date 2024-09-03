<div class="tab-pane fade" id="v-pills-category" role="tabpanel"
                                        aria-labelledby="v-pills-category-tab">
                                        <div class="fp_dashboard_body">
                                            <div class="container">

                                                <div class="row justify-content-center">

                                                    {{-- テーブルの角を丸くしたい ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー --}}
                                                    <div class="tab-pane fade col-6 show active" id="v-pills-category-1"
                                                        role="tabpanel" aria-labelledby="v-pills-category-tab1">
                                                        <div class="fp_dashboard_body">

                                                            <form action="#" class="mt-3">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Category" aria-label="Category"
                                                                        aria-describedby="button-addon2">
                                                                    <button class="btn" type="submit"
                                                                        id="button-addon2"
                                                                        style="background-color: rgb(156, 150, 176);"><span
                                                                            class="palanquin-dark-regular text-white">+
                                                                            Add</span></button>
                                                                </div>
                                                            </form>


                                                            <table
                                                                class="table table-hover align-middle bg-white border  palanquin-dark-regular text-center">
                                                                <thead class="small">
                                                                    <tr class="h5">
                                                                        <th style="color: rgb(52, 52, 117)">ID</th>
                                                                        <th style="color: rgb(52, 52, 117)">Category Name
                                                                        </th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="fs-4">
                                                                        <td>1</td>
                                                                        <td>Food</td>
                                                                        <td>
                                                                            <div class="d-flex flex-row">
                                                                                <button type="submit"
                                                                                    class="rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-pen-to-square text-dark"></i>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-trash-can text-dark"></i>
                                                                                </button>
                                                                            </div>
                                                                            @include('admin.categories.modal.status')
                                                                        </td>

                                                                    </tr>
                                                                    <tr class="fs-4">
                                                                        <td>2</td>
                                                                        <td>Drink</td>
                                                                        <td>
                                                                            <div class="d-flex flex-row">
                                                                                <button type="submit"
                                                                                    class="text-warning rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-pen-to-square text-dark"></i>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="text-danger rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-trash-can text-dark"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>

                                                                        @include('admin.menus.modal.status')
                                                                    </tr>
                                                                    <tr class="fs-4">
                                                                        <td>3</td>
                                                                        <td>Burger</td>
                                                                        <td>
                                                                            <div class="d-flex flex-row">
                                                                                <button type="submit"
                                                                                    class="text-warning rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#edit-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-pen-to-square text-dark"></i>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="text-danger rounded form-control w-auto mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#delete-category-{{-- $category->id --}}"
                                                                                    style="background-color: rgb(156, 150, 176);">
                                                                                    <i
                                                                                        class="fa-regular fa-trash-can text-dark"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>

                                                                        @include('admin.menus.modal.status')
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
