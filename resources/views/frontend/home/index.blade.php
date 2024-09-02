@extends('frontend.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/menuIndex.css') }}">
@endsection

@section('page-title')
    <div class="row justify-content-center align-items-center" style="height: 100%">
        <div class="text-center">
            <h1 class="display-4 ar" style="color: #FFB11B;">Our Popular Foods Menu</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container fade-in">

        {{-- Category Button --}}
        <div class="text-center mb-4">
            <button class="btn-yellow-index category-btn me-1" data-category="all">All Menu</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="burger">Burger</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="dessert">Desserts</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="salad">Salad</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="soup">Soup</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="noodle">Noodle</button>
            <button class="btn-yellow-outline category-btn me-1" data-category="pasta">Pasta</button>
            <button class="btn-yellow-outline category-btn" data-category="wrap">Wrap</button>
        </div>

        {{-- Menu List --}}
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col menu-item" data-category="grill">
                    <div class="card">
                        <div class="badge-category">Grill</div>
                        <img src="{{ asset('frontend/images/food1.jpg') }}" class="card-img-top" alt="Salmon">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Salmon</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">&#8369;90.50</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <button type="button" class="btn-yellow text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#productDetailModal">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="dessert">
                    <div class="card">
                        <div class="badge-category">Dessert</div>
                        <img src="{{ asset('frontend/images/food2.jpg') }}" class="card-img-top" alt="Acai Bowl">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Acai Bowl</h4>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <span class="price-tag">&#8369;80.00</span>
                                <span class="discount-price">&#8369;90.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <button type="button" class="btn-yellow text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#productDetailModal">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="salad">
                    <div class="card">
                        <div class="badge-category">Salad</div>
                        <img src="{{ asset('frontend/images/food3.jpg') }}" class="card-img-top" alt="Salad">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Salad</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="soup">
                    <div class="card">
                        <div class="badge-category">Soup</div>
                        <img src="{{ asset('frontend/images/food4.jpg') }}" class="card-img-top" alt="Soup">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Soup</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="noodle">
                    <div class="card">
                        <div class="badge-category">Noodle</div>
                        <img src="{{ asset('frontend/images/food5.jpg') }}" class="card-img-top" alt="Noodle">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Udon Noodle</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="pasta">
                    <div class="card">
                        <div class="badge-category">Pasta</div>
                        <img src="{{ asset('frontend/images/slider_img_1.png') }}" class="card-img-top"
                            alt="Tomato Pasta">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">>Tomato Pasta</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="wrap">
                    <div class="card">
                        <div class="badge-category">Wrap</div>
                        <img src="{{ asset('frontend/images/slider_img_2.png') }}" class="card-img-top" alt="Beef Wrap">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Beef Wrap</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="burger">
                    <div class="card">
                        <div class="badge-category">Burger</div>
                        <img src="{{ asset('frontend/images/slider_img_3.png') }}" class="card-img-top" alt="Burger">
                        <div class="card-body">
                            <h4 class="card-title text-center m-0">Cheese Burger</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="price-tag">$99.00</span>
                            </div>
                            <div class="card-icon-group text-center">
                                <a href="" class="btn-yellow text-decoration-none">
                                    <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('frontend.home.modals.menuModal')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/menuIndex.js') }}"></script>
    <script>
        function incrementQuantity() {
            var currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue)) {
                quantityInput.value = currentValue + 1;
                updateTotal();
            }
        }

        function decrementQuantity() {
            var currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateTotal();
            }
        }

        const basePrice = 90.5; // 基本の価格
        const quantityInput = document.getElementById("quantity");
        const totalPriceElement = document.getElementById("total-price");

        function updateTotal() {
            let total = basePrice;

            // サイズの選択に基づく価格の加算
            const selectedSize = document.querySelector(
                'input[name="size"]:checked'
            );
            if (selectedSize) {
                total += parseFloat(selectedSize.getAttribute("data-price"));
            }

            // オプションの選択に基づく価格の加算
            document
                .querySelectorAll('input[name="option[]"]:checked')
                .forEach((option) => {
                    total += parseFloat(option.getAttribute("data-price"));
                });

            // 個数の乗算
            const quantity = parseInt(quantityInput.value) || 1;
            total *= quantity;

            // 合計金額の更新
            totalPriceElement.textContent = total.toFixed(2);
        }

        // 初期合計金額の計算
        updateTotal();
    </script>
@endpush
