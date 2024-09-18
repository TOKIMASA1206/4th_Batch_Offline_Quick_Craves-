@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">

        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">Create Point</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.point.index') }}" class="btn btn-dark">
                            < Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.point.store', $point->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="points" class="form-label">Points</label>
                        <input type="text" class="form-control" name="points" id="points"
                        value="{{ old('points') }}">
                        @error('points')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="purchase_amount" class="form-label">Purchase Amount</label>
                        <input type="text" class="form-control" name="purchase_amount" id="purchase_amount"
                        value="{{ old('purchase_amount') }}">
                        @error('purchase_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="bonus_points" class="form-label">Bonus Points</label>
                        <input type="text" class="form-control" name="bonus_points" id="bonus_points"
                        value="{{ old('bonus_points') }}">
                        @error('bonus_points')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </section>
@endsection
