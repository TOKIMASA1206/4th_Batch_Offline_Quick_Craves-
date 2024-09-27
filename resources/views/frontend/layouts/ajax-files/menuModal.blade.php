<div class="text-end">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="" id="modal_add_to_cart_form">
    @csrf
    <input type="hidden" name="menu_item_id" value="{{ @$menuItem->id }}">

    <div class="row">
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <img src="{{ asset(@$menuItem->item_image) }}" alt="food1" class="img-fluid">
        </div>

        <div class="col-12 col-md-6">
            <h1 class="ar mb-3">{{ @$menuItem->name }}</h1>
            <h3 class="price-tag mb-3">
                @if ($menuItem->offer_price > 0)
                    &#8369; {{ @$menuItem->offer_price }}
                    <input type="hidden" name="base_price" value="{{ $menuItem->offer_price }}">
                    <del style="font-size: 16px; color: black;">&#8369; {{ @$menuItem->price }}</del>
                @else
                    &#8369; {{ @$menuItem->price }}
                    <input type="hidden" name="base_price" value="{{ $menuItem->price }}">
                @endif
            </h3>
            <p class="mb-4">{{ @$menuItem->description }}</p>

            <div class="row mb-4">

                @if (@$menuItem->menuSizes()->exists())
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <h4 class="mb-3">Select Size</h4>
                        @foreach ($menuItem->menuSizes as $size)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="menu_size"
                                    id="size-{{ $size->id }}" value="{{ $size->id }}"
                                    data-price="{{ $size->price }}">
                                <div class="d-flex justify-content-between">
                                    <label class="form-check-label" for="size-{{ $size->id }}">
                                        {{ $size->name }}
                                    </label>
                                    <p>+&#8369; {{ $size->price }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($menuItem->menuOptions()->exists())
                    <div class="col-12 col-lg-6">
                        <h4 class="mb-3">Select Option</h4>
                        @foreach ($menuItem->menuOptions as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="menu_option[]"
                                    id="option-{{ $option->id }}" value="{{ $option->id }}"
                                    data-price="{{ $option->price }}">
                                <div class="d-flex justify-content-between">
                                    <label class="form-check-label"
                                        for="option-{{ $option->id }}">{{ $option->name }}</label>
                                    <p>+&#8369; {{ $option->price }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="d-flex justify-content-between mb-2">
                <div>
                    @if ($menuItem->offer_price > 0)
                        <h1>Total: &#8369;<span id="total-price">{{ $menuItem->offer_price }}</span></h1>
                    @else
                        <h1>Total: &#8369;<span id="total-price">{{ $menuItem->price }}</span></h1>
                    @endif
                </div>

                {{-- Quantity --}}
                <div class="d-flex align-items-center me-3">

                    {{-- decrement --}}
                    <button class="btn btn-outline-danger decrement" type="button">
                        <i class="fa-solid fa-minus"></i>
                    </button>

                    <input type="text" name="quantity" id="quantity" value="1" min="1"
                        class="form-control text-center mx-1" style="width: 50px;" readonly>

                    {{-- increment --}}
                    <button class="btn btn-outline-success increment" type="button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <div>
                <button type="submit" class="btn-brown w-100 modal_cart_botton">ADD CART</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('input[name="menu_size"]').on('change', function() {
            updateTotalPrice();
        })

        $('input[name="menu_option[]"]').on('change', function() {
            updateTotalPrice();
        })

        $('.increment').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            quantity.val(currentQuantity + 1);
            updateTotalPrice();

        })

        $('.decrement').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            if (currentQuantity > 1) {
                quantity.val(currentQuantity - 1);
                updateTotalPrice();
            }
        })

        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="base_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionPrice = 0;
            let quantity = parseFloat($('#quantity').val());

            // Calculate selected size Price
            let selectedSize = $('input[name="menu_size"]:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data('price'));
            }

            // Calculate selected options price
            let selectedOptions = $('input[name="menu_option[]"]:checked');
            $(selectedOptions).each(function() {
                selectedOptionPrice += parseFloat($(this).data('price'));
            })

            // Calculate Total Price
            let totalPrice = ((basePrice + selectedSizePrice + selectedOptionPrice) * quantity).toFixed(2);

            $('#total-price').text(totalPrice);
        }

        // Add to cart function
        $('#modal_add_to_cart_form').on('submit', function(e) {
            e.preventDefault();

            // Validation
            let selectedSize = $('input[name="menu_size"]');

            if (selectedSize.length > 0) {
                if ($('input[name="menu_size"]:checked').val() === undefined) {
                    toastr.error('Please select a size');
                    console.error('Please select a size');
                    return;
                }
            }

            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: "{{ route('add-to-cart') }}",
                data: formData,
                beforeSend: function() {
                    $('.modal_cart_botton').attr('disabled', true);
                    $('.modal_cart_botton').html(
                        '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                    );
                },
                success: function(response) {
                    // updateSidebarCart();
                    $('.cart_count').text(response.cartCount)
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    $('.modal_cart_botton').html('add to cart');
                    $('.modal_cart_botton').attr('disabled', false);
                }
            })

        })



    })
</script>
