@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header mt-3">
            <h1>Proceed</h1>
        </div>
        <div class="row">

            @foreach ($all_orders as $order)
                <div class="col-md-6 col-lg-4 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title palanquin-dark-regular">Number: {{ $order->id }}</h5>
                            <h5 class="card-title palanquin-dark-regular">User: {{ $order->user->name }}</h5>
                            <h5 class="card-title palanquin-dark-regular">{{ $order->created_at }}
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
                                <tr class="">
                                    <td class="align-middle"> {{ $item->menu_item_name }}</td>
                                    <td class="align-middle">4</td>
                                    <td class="align-middle">
                                        <button id="myButton{{ $order->id }}_{{ $item->id }}" type="submit" class="btn start text-white">Start</button>
                                        <button id="doneButton{{ $order->id }}_{{ $item->id }}" class="btn done text-white">DONE</button>
                                    </td>
                                    <td>
                                        <button id="resetButton{{ $order->id }}_{{ $item->id }}" class="reset btn btn-link">
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
                const myButton{{ $order->id }}_{{ $item->id }} = document.getElementById('myButton{{ $order->id }}_{{ $item->id }}');
                const doneButton{{ $order->id }}_{{ $item->id }} = document.getElementById('doneButton{{ $order->id }}_{{ $item->id }}');
                const resetButton{{ $order->id }}_{{ $item->id }} = document.getElementById('resetButton{{ $order->id }}_{{ $item->id }}');
                let state{{ $order->id }}_{{ $item->id }} = 'start'; // 各オーダーごとに初期状態を保持

                // スタートボタンのクリックイベント
                myButton{{ $order->id }}_{{ $item->id }}.addEventListener('click', () => {
                    if (state{{ $order->id }}_{{ $item->id }} === 'start') {
                        myButton{{ $order->id }}_{{ $item->id }}.textContent = 'End';
                        myButton{{ $order->id }}_{{ $item->id }}.classList.remove('start');
                        myButton{{ $order->id }}_{{ $item->id }}.classList.add('end');
                        doneButton{{ $order->id }}_{{ $item->id }}.style.display = 'none'; // DONEボタンを隠す
                        state{{ $order->id }}_{{ $item->id }} = 'end';
                        sendStatusToServer('Cooking started', {{ $order->id }}, {{ $item->id }});
                    } else if (state{{ $order->id }}_{{ $item->id }} === 'end') {
                        myButton{{ $order->id }}_{{ $item->id }}.style.display = 'none'; // Start/Endボタンを隠す
                        doneButton{{ $order->id }}_{{ $item->id }}.style.display = 'inline-block'; // DONEボタンを表示
                        state{{ $order->id }}_{{ $item->id }} = 'done';
                        sendStatusToServer('Cooking ended', {{ $order->id }}, {{ $item->id }});
                    }
                });

                // リセットボタンのクリックイベント
                resetButton{{ $order->id }}_{{ $item->id }}.addEventListener('click', () => {
                    myButton{{ $order->id }}_{{ $item->id }}.textContent = 'Start';
                    myButton{{ $order->id }}_{{ $item->id }}.style.display = 'inline-block'; // Startボタンを表示
                    myButton{{ $order->id }}_{{ $item->id }}.classList.remove('end');
                    myButton{{ $order->id }}_{{ $item->id }}.classList.add('start');
                    doneButton{{ $order->id }}_{{ $item->id }}.style.display = 'none'; // DONEボタンを隠す
                    state{{ $order->id }}_{{ $item->id }} = 'start';
                    // sendStatusToServer('Cooking reset', {{ $order->id }}, {{ $item->id }});
                });
            @endforeach
        @endforeach

        // 状態をサーバーに送信する関数
        function sendStatusToServer(status, orderId, itemId) {
            console.log(`Order: ${orderId}, Item: ${itemId}, Status: ${status}`);
            // 実際のリクエストはここで行います (例: fetch API)
        }

        // TestEvent::dispatch();

    });
</script>
@endpush
