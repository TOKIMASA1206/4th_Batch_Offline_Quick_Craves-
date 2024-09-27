@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart_style.css') }}">
@endsection

@section('page-title')
    <h1 class="banner_title ar">Payment</h1>
@endsection

@section('sub-title')
    <span class="sub_title"><i class="fa-solid fa-house-chimney"></i> <span class="me-2">Home</span> - <span
            class="mx-2">Payment</span></span>
@endsection

@section('content')


    <section class="cart_view ">
        <div class="container">
            <div class="row">
                <h2 class="mt-5"> Payment Successful!</h2>
                <div class="col-12 text-center">

                    <p class="inform_icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </p>
                    <p class="mb-3">Thank you for your purchase! Your order has been successfully processed.</p>

                    <p>You can view your order history <a href="{{ route('profile_index') }}">here</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection
