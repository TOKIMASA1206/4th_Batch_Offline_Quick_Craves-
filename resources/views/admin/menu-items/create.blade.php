@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">
        <div class="section-header d-flex justify-content-between">
            <h1>Create Menu Item</h1>
            <div>
                <a href="{{ route('admin.menu-item.index') }}" class="btn btn-dark me-3">
                    < Back</a>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Menu Item</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu-item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div id="image-preview" class="mb-3">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control select2" id="">
                            @if ($categories->isEmpty())
                                <option value="">No categories yet</option>
                                </select>
                                <a href="{{ route('admin.category.create') }}" class="fs-5 ms-3" style="text-decoration: none">→ Create category </a>
                            @else
                                <option value="">select</option>
                                @foreach ($categories as $category)
                                    <option @selected(old('category') == $category->id) value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Offer Price</label>
                        <input type="text" name="offer_price" class="form-control" value="{{ old('offer_price') }}">
                    </div>
                    @error('offer_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option selected value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    @error('show_at_home')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
