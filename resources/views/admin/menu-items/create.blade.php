@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">
        <div class="section-header">
            <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary mb-3">Back</a>
            <h1>Create Menu Item</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Menu Item</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu-item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview mb-3"
                            style="width: 300px; height: 300px; border: 2px dashed #ddd;">
                        </div>
                        <input class="form-control w-25" type="file" name="image" id="image-upload" />
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
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category') == $category->id) value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Image preview handler
            $('#image-upload').change(function() {
                const input = this;

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Clear any existing content inside the preview div
                        $('#image-preview').html('');

                        // Create a new img element and set the src to the file's content
                        $('#image-preview').append('<img src="' + e.target.result +
                            '" style="width: 100%; height: 100%; object-fit: contain;" />');
                    };

                    // Read the file as a Data URL
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endpush
