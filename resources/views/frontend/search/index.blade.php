@extends('frontend.layouts.app')

@section('page-title')
    <h1 class="banner_title ar">Search Results</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Search</span></span>
@endsection

@section('content')
    <div class="container">

        {{-- 検索結果の表示 --}}
        @if ($menuItems->isEmpty())
            <div class="row">
                <h4 class="mt-5">No menu items found for "{{ $query }}".</h4>
                <div class="col-12 text-center">

                    <p class="inform_icon">
                        <i class="fa-solid fa-cat"></i>
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-dark fw-bold fs-3">Continue Shopping</a>
                </div>
            </div>
        @else
            <div class="container my-5 fade-in">
                <h2 class="text-center my-5 ar">Search Results for "{{ $query }}"</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ($menuItems as $item)
                        <div class="col">
                            <div class="card">
                                <div class="badge-category">{{ $item->category->name }}</div>
                                <img src="{{ asset($item->item_image) }}" class="card-img-top" alt="{{ $item->slug }}">
                                <div class="card-body">
                                    <h4 class="card-title menu-title text-center m-0">{{ $item->name }}</h4>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="price-tag">
                                            @if ($item->offer_price > 0)
                                                &#8369; {{ $item->offer_price }}
                                                <del style="font-size: 16px; color: black;">&#8369;
                                                    {{ $item->price }}</del>
                                            @else
                                                &#8369; {{ $item->price }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="card-icon-group text-center">
                                        <button type="button" class="btn-yellow text-decoration-none"
                                            onclick="loadMenuModal('{{ $item->id }}')">
                                            <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-center">
            {{ $menuItems->appends(['query' => $query])->links() }}
        </div>


    </div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/menuIndex.js') }}"></script>
@endpush
