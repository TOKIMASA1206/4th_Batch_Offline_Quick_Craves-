@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header mb-4">
            <h1>Proceed</h1>
        </div>
        <div class="row">

            @foreach ($all_orders as $order)
                <div class="col-md-6 col-lg-4 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header py-3 text-center">
                            <h5 class="card-title palanquin-dark-regular d-inline fw-bold">Number: {{ $order->id }}</h5>
                            <h5 class="card-title palanquin-dark-regular d-inline ms-3 fw-bold">User: {{ $order->user->name }}</h5>
                        </div>
                        <div class="card-body text-center">

                            <h5 class="card-title palanquin-dark-regular mt-3">{{ $order->created_at }}
                                <span>

                                    <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                        data-bs-target="#delete-proceed-{{ $order->id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                    @include('admin.proceeds.modal.status')

                                </span>
                            </h5>
                        </div>
                        <table class="table table-hover text-center">

                            @foreach ($all_orderItems[$order->id] as $item)
                                @php
                                    $status = $item->status;
                                @endphp

                                <tr class="">
                                    <td class="align-middle"> {{ $item->menu_item_name }}</td>
                                    <td class="align-middle">{{ $item->qty }}</td>
                                    <td class="align-middle">
                                        @if ($status == 'Order placed' || $status == 'pending')
                                            <button id="myButton{{ $order->id }}_{{ $item->id }}" type="submit"
                                                class="btn start text-white px-2 py-1">Start</button>
                                            <button id="doneButton{{ $order->id }}_{{ $item->id }}"
                                                class="btn done text-white px-2 py-1">DONE</button>
                                        @elseif ($status == 'Cooking started')
                                            <button id="myButton{{ $order->id }}_{{ $item->id }}" type="submit"
                                                class="btn end text-white px-2 py-1">End</button>
                                            <button id="doneButton{{ $order->id }}_{{ $item->id }}"
                                                class="btn done text-white px-2 py-1">DONE</button>
                                        @elseif ($status == 'Cooking ended')
                                            <button id="myButton{{ $order->id }}_{{ $item->id }}" type="submit"
                                                class="btn end d-none text-white px-2 py-1">End</button>
                                            <button id="doneButton{{ $order->id }}_{{ $item->id }}"
                                                class="btn done mx-auto d-block text-white px-2 py-1">DONE</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button id="resetButton{{ $order->id }}_{{ $item->id }}"
                                            class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // オーダーごとにループを回してボタンの動作を設定
            @foreach ($all_orders as $order)
                @foreach ($all_orderItems[$order->id] as $item)
                    const myButton{{ $order->id }}_{{ $item->id }} = document.getElementById(
                        'myButton{{ $order->id }}_{{ $item->id }}');
                    const doneButton{{ $order->id }}_{{ $item->id }} = document.getElementById(
                        'doneButton{{ $order->id }}_{{ $item->id }}');
                    const resetButton{{ $order->id }}_{{ $item->id }} = document.getElementById(
                        'resetButton{{ $order->id }}_{{ $item->id }}');
                    let state{{ $order->id }}_{{ $item->id }} = '{{ $item->status }}'; // 現在のステータスを保持

                    // スタート/エンドボタンのクリックイベント
                    myButton{{ $order->id }}_{{ $item->id }}.addEventListener('click', () => {
                        if (state{{ $order->id }}_{{ $item->id }} === 'Order placed' ||
                            state{{ $order->id }}_{{ $item->id }} === 'pending') {
                            myButton{{ $order->id }}_{{ $item->id }}.textContent = 'End';
                            myButton{{ $order->id }}_{{ $item->id }}.classList.remove('start');
                            myButton{{ $order->id }}_{{ $item->id }}.classList.add('end');
                            doneButton{{ $order->id }}_{{ $item->id }}.style.display =
                                'none'; // DONEボタンを隠す
                            state{{ $order->id }}_{{ $item->id }} = 'Cooking started';
                            sendStatusToServer('Cooking started', {{ $order->id }},
                                {{ $item->id }});
                        } else if (state{{ $order->id }}_{{ $item->id }} === 'Cooking started') {
                            myButton{{ $order->id }}_{{ $item->id }}.style.display =
                                'none'; // Start/Endボタンを隠す
                            doneButton{{ $order->id }}_{{ $item->id }}.style.display =
                                'inline-block'; // DONEボタンを表示
                            state{{ $order->id }}_{{ $item->id }} = 'Cooking ended';
                            sendStatusToServer('Cooking ended', {{ $order->id }},
                                {{ $item->id }});
                        }
                    });

                    // リセットボタンのクリックイベント
                    resetButton{{ $order->id }}_{{ $item->id }}.addEventListener('click', () => {
                        myButton{{ $order->id }}_{{ $item->id }}.textContent = 'Start';
                        myButton{{ $order->id }}_{{ $item->id }}.style.display =
                            'inline-block'; // Startボタンを表示
                        myButton{{ $order->id }}_{{ $item->id }}.classList.remove('end');
                        myButton{{ $order->id }}_{{ $item->id }}.classList.remove('d-none');
                        myButton{{ $order->id }}_{{ $item->id }}.classList.add('start');
                        doneButton{{ $order->id }}_{{ $item->id }}.style.display =
                            'none'; // DONEボタンを隠す
                        doneButton{{ $order->id }}_{{ $item->id }}.classList.remove(
                            'd-block') // DONEボタンを隠す
                        state{{ $order->id }}_{{ $item->id }} = 'Order placed';
                        sendStatusToServer('Order placed', {{ $order->id }}, {{ $item->id }});
                    });
                @endforeach
            @endforeach

            // 状態をサーバーに送信する関数
            function sendStatusToServer(status, orderId, itemId) {
                console.log(`Order: ${orderId}, Item: ${itemId}, Status: ${status}`);

                $.ajax({
                    url: '/admin/orders/update-status',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    timeout: 3000,
                    data: ({
                        order_id: orderId,
                        item_id: itemId,
                        status: status
                    }),
                    success: function(data) {
                        console.log(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', errorThrown);
                    }
                });
            }
        });

        $(document).ready(function() {
            window.Echo.channel("displayOrder")
                .listen('DisplayOrderEvent', (e) => {
                    console.log('New Order Placed!!');

                    toastr.success('New Order Placed!! ', {
                        "closeButton": true,
                        "progressBar": true,
                        "timeOut": "3000",
                        "extendedTimeOut": "1000"
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 3500);
                });
        })
    </script>
@endpush
