@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">

        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">Edit Voucher</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.voucher.index') }}" class="btn btn-dark">
                            < Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.voucher.update', $voucher->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Voucher Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $voucher->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Voucher Code</label>
                        <input type="text" class="form-control" name="code" id="code"
                            value="{{ old('code',$voucher->code) }}">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="discount_value" class="form-label">Discount Value</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white" id="discount_unit">¥</span>
                            <input type="number" class="form-control" name="discount_value" id="discount_value"
                                value="{{ old('discount_value' ,$voucher->discount_value) }}" aria-describedby="discount_unit">
                        </div>
                        @error('discount_value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="form-group mb-3">
                      <label for="expiry_date" class="form-label">Expiry Date</label>
                      <input type="date" class="form-control" name="expiry_date" id="expiry_date"
                          value="{{ old('expiry_date' , $voucher->expiry_date) }}">
                      @error('expiry_date')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>


                    <div class="form-group mb-4">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Edit</button>
                </form>

            </div>
        </div>
    </section>
@endsection
