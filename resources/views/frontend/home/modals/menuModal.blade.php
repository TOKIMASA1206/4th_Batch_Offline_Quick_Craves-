{{-- Modal --}}
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <img src="{{ asset('frontend/images/food1.jpg') }}" alt="food1" class="img-fluid">
                        </div>

                        <div class="col-12 col-md-6">
                            <h1 class="ar mb-3">Grilled Salmon</h1>
                            <h3 class="price-tag mb-3">&#8369; 90.50</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Cupiditate reiciendis ea optio odio dignissimos sit dolores ut sequi voluptatem hic
                                possimus, eaque tempore commodi facilis. Deleniti explicabo officia temporibus sed.
                            </p>

                            <form action="" method="POST">
                                <div class="row mb-4">
                                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                        <h4 class="mb-3">Select Size</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="size" id="sizeLarge"
                                                value="large" data-price="100" onchange="updateTotal()">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-check-label" for="sizeLarge">Large</label>
                                                <p>+&#8369;100</p>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="size"
                                                id="sizeMedium" value="medium" data-price="50" onchange="updateTotal()">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-check-label" for="sizeMedium">Medium</label>
                                                <p>+&#8369;50</p>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="size" id="sizeSmall"
                                                value="small" data-price="30" onchange="updateTotal()">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-check-label" for="sizeSmall">Small</label>
                                                <p>+&#8369;30</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <h4 class="mb-3">Select Option</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="option[]"
                                                id="optionCocaCola" value="coca-cola" data-price="50"
                                                onchange="updateTotal()">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-check-label" for="optionCocaCola">Coca-Cola</label>
                                                <p>+&#8369;50</p>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="option[]"
                                                id="option7up" value="7up" data-price="50" onchange="updateTotal()">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-check-label" for="option7up">7up</label>
                                                <p>+&#8369;50</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <h1>Total: &#8369;<span id="total-price">350</span></h1>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <button class="btn btn-outline-danger" type="button"
                                            onclick="decrementQuantity()"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" name="quantity" id="quantity" value="1"
                                            min="1" class="form-control text-end mx-1" style="width: 60px;"
                                            onchange="updateTotal()" readonly>
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="incrementQuantity()"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn-brown w-100">ADD CART</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
