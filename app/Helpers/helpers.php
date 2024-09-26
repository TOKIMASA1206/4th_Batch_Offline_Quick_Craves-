<?php



/** Create unique slug */
if (!function_exists('generateUniqueSlug')) {

    function generateUniqueSlug($model, $name, $existingSlug = null): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = Illuminate\Support\Str::slug($name);

        if ($existingSlug && $slug === $existingSlug) {
            return $existingSlug;
        }

        $count = 1;
        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Illuminate\Support\Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

// Calculate product total price
if (!function_exists('productTotal')) {
    function productTotal($rowId)
    {
        $total = 0;

        $product = Cart::get($rowId);

        $productPrice = $product->price;
        $sizePrice = $product->options?->menu_size['price'] ?? 0;
        $optionsPrice = 0;
        foreach ($product->options->menu_options as $option) {
            $optionsPrice += $option['price'];
        }

        $total += round(($productPrice + $sizePrice + $optionsPrice) * $product->qty, 2);

        return $total;
    }
}

// Calculate cart total price
if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;

        foreach (Cart::content() as $item) {
            $productPrice = $item->price;
            $sizePrice = $item->options?->menu_size['price'] ?? 0;
            $optionsPrice = 0;
            foreach ($item->options->menu_options as $option) {
                $optionsPrice += $option['price'];
            }

            $total += round(($productPrice + $sizePrice + $optionsPrice) * $item->qty, 2);
        }

        return $total;
    }
}

// Grand cart total
if (!function_exists('grandCartTotal')) {
    function grandCartTotal()
    {
        $total = 0;
        $cartTotal = cartTotal();

        if (session()->has('voucher')) {
            $discount = session()->get('voucher')['discount'];
            $total = $cartTotal - $discount;

            return $total;
        } else {
            $total = $cartTotal;
            return $total;
        }
    }
}

/** Generate Invoice Id  */
if (!function_exists('generateInvoiceId')) {

    function generateInvoiceId()
    {
        $randomNumber = rand(1, 9999);
        $currentDateTime = now();

        $invoiceId = $randomNumber . $currentDateTime->format('yd') . $currentDateTime->format('s');

        return $invoiceId;
    }
}

/** Generate Invoice Id  */
if (!function_exists('resetVoucher')) {

    function resetVoucher()
    {
        session()->forget('voucher');

        return response([
            'message' => 'Voucher has been removed',
        ]);
    }
}
