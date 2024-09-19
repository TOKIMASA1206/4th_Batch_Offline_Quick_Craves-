@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">
        <div class="section-header d-flex justify-content-between">
            <h1>Update Menu Item</h1>
            <div>
                <a href="{{ route('admin.menu-item.index') }}" class="btn btn-dark me-3">< Back</a>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Menu Item</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.menu-item.update', $menu_item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div id="image-preview" class="image-preview mb-3">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $menu_item->name) }}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control select2" id="">
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category', $menu_item->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price', $menu_item->price) }}">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Offer Price</label>
                        <input type="text" name="offer_price" class="form-control" value="{{ old('offer_price', $menu_item->offer_price) }}">
                    </div>
                    @error('offer_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ old('description', $menu_item->description) }}</textarea>
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option @selected($menu_item->show_at_home == 1) value="1">Yes</option>
                            <option @selected($menu_item->show_at_home == 0) value="0">No</option>
                        </select>
                    </div>
                    @error('show_at_home')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" id="">
                            <option @selected($menu_item->status == 1) value="1">Active</option>
                            <option @selected($menu_item->status == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.image-preview').css({
                'background-image': 'url({{ asset($menu_item->item_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush
