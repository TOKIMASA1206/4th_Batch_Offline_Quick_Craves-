<div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
    <div class="body">
        <h3 class="menu-section-title mb-3 mt-2 ar">
            Order List
        </h3>
        <div class="order">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr class="t_header">
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> {{-- complete, active, cancel  --}}
                        @foreach ($orders as $order)
                            <tr class="t_body">
                                <td>
                                    <h5># {{ $order->invoice_id }}</h5>
                                </td>
                                <td>
                                    <p>{{ date('M d, Y', strtotime($order->created_at)) }}</p>
                                </td>
                                <td>
                                    @if ($order->payment_status == 'completed')
                                        <span class="complete">Complated</span>
                                    @elseif ($order->payment_status == 'Failed')
                                        <span class="cancel">Canceled</span>
                                    @endif
                                </td>
                                <td>
                                    <h5>₱ {{ $order->grand_total }}</h5>
                                </td>
                                <td>
                                    <a class="view_invoice btn-yellow-black p-1"
                                        onclick="viewInvoice('{{ $order->id }}')">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach ($orders as $order)
            <div class="invoice invoice_details_{{ $order->id }}">
                <div class="invoice_header ">
                    <div class="header_address ">
                        <p class="p-0 m-0"><b>invoice no: </b><span>{{ $order->invoice_id }}</span></p>
                        <p class="p-0 m-0"><b>Transaction ID:</b> <span>{{ $order->transaction_id }}</span></p>
                        <p class="p-0 m-0"><b>date:</b> <span>{{ date('M d, Y', strtotime($order->created_at)) }}</span>
                        </p>
                    </div>
                    <span class="go_back btn-yellow-black  h-50 mt-3" data-invoice-id="{{ $order->id }}">
                        <i class="fas fa-long-arrow-alt-left"></i> go back
                    </span>
                </div>
                <div class="invoice_body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="t_header">
                                    <th class="sl_no">SL</th>
                                    <th class="package">item description</th>
                                    <th class="price">Price</th>
                                    <th class="qnty">Quantity</th>
                                    <th class="total" style="">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    @php
                                        $size = json_decode($item->menu_item_size);
                                        $options = json_decode($item->menu_item_option);

                                        $qty = $item->qty;
                                        $unitPrice = $item->unit_price;
                                        $sizePrice = $size->price ?? 0;

                                        $optionPrice = 0;
                                        foreach ($options as $optionItem) {
                                            $optionPrice += $optionItem->price;
                                        }

                                        $productTotal = ($unitPrice + $sizePrice + $optionPrice) * $qty;
                                    @endphp
                                    <tr>
                                        <td class="sl_no">{{ ++$loop->index }}</td>
                                        <td class="package">
                                            <p>{{ $item->menu_item_name }}</p>
                                            <span class="size">
                                                {{ @$size->name }}
                                                {{ @$size->price ? '( +₱' . @$size->price . ')' : '' }}
                                            </span><br>

                                            @foreach (@$options as $option)
                                                <span class="coca_cola">
                                                    {{ @$option->name }}
                                                    {{ @$option->price ? '( +₱' . @$option->price . ')' : '' }}</span>
                                            @endforeach
                                        </td>
                                        <td class="price">
                                            <b>{{ $item->unit_price }}</b>
                                        </td>
                                        <td class="qnty">
                                            <b>{{ $item->qty }}</b>
                                        </td>
                                        <td class="total">
                                            <b>₱ {{ $productTotal }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td class="package" colspan="2">
                                        <b>sub total</b>
                                    </td>
                                    <td class="qnty">
                                        <b>{{ $order->product_qty }}</b>
                                    </td>
                                    <td class="total">
                                        <b>₱ {{ $order->subtotal }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="package text-danger" colspan="2">
                                        <b>(-) Voucher</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total text-danger">
                                        @if ($order->discount > 0)
                                            <b>₱ {{ $order->discount }}</b>
                                        @else
                                            <b>₱ 0</b>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="package" colspan="2">
                                        <b>Total Paid</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total">
                                        <b>₱ {{ $order->grand_total }}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".go_back").on("click", function() {
                $(".order").fadeIn();
            });

            $(".go_back").on("click", function() {
                $(".invoice").fadeOut();
            });
        })

        function viewInvoice(id) {
            $(".order").fadeOut();
            $(".invoice_details_" + id).fadeIn();
        }
    </script>
@endpush
