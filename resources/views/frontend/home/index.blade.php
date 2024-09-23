@extends('frontend.layouts.app')

@section('page-title')
    <h1 class="banner_title ar">Our Popular Foods Menu</h1>
@endsection
@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Menu</span></span>
@endsection



@section('content')
    <div class="container">

        {{-- Category Button --}}
        <div class="text-center mb-4 fade-in">
            <button class="btn-yellow-index category-btn me-1" data-category="all">All Menu</button>
            @foreach ($categories as $category)
                <button class="btn-yellow-outline category-btn me-1"
                    data-category="{{ $category->slug }}">{{ $category->name }}</button>
            @endforeach

            {{-- Menu List --}}
            <div class="container my-5 fade-in">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ($categories as $category)
                        @php
                            $menuItems = \App\Models\MenuItem::where([
                                'show_at_home' => 1,
                                'status' => 1,
                                'category_id' => $category->id,
                            ])
                                ->orderBy('id', 'DESC')
                                ->take(8)
                                ->get();
                        @endphp
                        @foreach ($menuItems as $item)
                            <div class="col menu-item" data-category="{{ $category->slug }}">
                                <div class="card">
                                    <div class="badge-category">{{ $item->category->name }}</div>
                                    <img src="{{ asset($item->item_image) }}" class="card-img-top"
                                        alt="{{ $item->slug }}">
                                    <div class="card-body">
                                        <h4 class="card-title menu-title text-center m-0">{{ $item->name }}</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <span class="price-tag">
                                                @if ($item->offer_price > 0)
                                                    &#8369; {{ $item->offer_price }}
                                                    <del style="font-size: 16px; color: black;">&#8369; {{ $item->price }}</del>
                                                @else
                                                    &#8369; {{ $item->price }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="card-icon-group text-center">
                                            <button type="button" class="btn-yellow text-decoration-none" onclick="loadMenuModal('{{ $item->id }}')">
                                                <i class="fa-solid fa-basket-shopping"></i> Add Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            {{-- @include('frontend.home.modals.menuModal') --}}
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('frontend/js/menuIndex.js') }}"></script>
    @endpush
