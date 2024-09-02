@extends('frontend.layouts.app')

@section('title', 'Proceed')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/card_style.css') }}">
@endsection

@section('page-title')
    <div class="row justify-content-center align-items-center" style="height: 100%">
        <div class="text-center">
            <h1 class="display-4 ar" style="color: #FFB11B;">Card</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <!-- Card Add Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cardAddModal">
            Card Add
        </button>

        <!-- Card Add Modal -->
        @include('frontend.card.modal.add')

        <!-- Card Edit Button -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cardEditModal">
            Card Edit
        </button>

        <!-- Card Edit Modal -->
        @include('frontend.card.modal.edit')

        <!-- Card Delete Button -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cardDeleteModal">
            Card Delete
        </button>

        <!-- Card Delete Modal -->
        @include('frontend.card.modal.delete')

    </div>

@endsection
