<div class="tab-pane fade" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab">
    <div class="fp_dashboard_body ps-4">
        <div class="container">

            <div class="row justify-content-center">

                {{-- テーブルの角を丸くしたい ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー --}}
                <div class="tab-pane fade col-6 show active" id="v-pills-category-1" role="tabpanel"
                    aria-labelledby="v-pills-category-tab1">
                    <div class="fp_dashboard_body">

                        <form action="#" class="mt-3">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Category" aria-label="Category"
                                    aria-describedby="button-addon2">
                                <button class="btn-blue" type="submit" id="button-addon2"><span
                                        class="palanquin-dark-regular text-white">+
                                        Add</span></button>
                            </div>
                        </form>


                        <table
                            class="table table-hover align-middle bg-white border  palanquin-dark-regular text-center">
                            <thead class="small">
                                <tr class="h6">
                                    <th class="text-center">#</th>
                                    <th>Category Name
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Food</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="submit" class="btn-yellow-black" data-bs-toggle="modal"
                                                data-bs-target="#edit-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                data-bs-target="#delete-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </div>
                                        @include('admin.categories.modal.status')
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Drink</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="submit" class="btn-yellow-black" data-bs-toggle="modal"
                                                data-bs-target="#edit-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                data-bs-target="#delete-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>

                                    @include('admin.menus.modal.status')
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Burger</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="submit" class="btn-yellow-black" data-bs-toggle="modal"
                                                data-bs-target="#edit-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                data-bs-target="#delete-category-{{-- $category->id --}}">
                                                <i class="fa-regular fa-trash-can"></i>
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
