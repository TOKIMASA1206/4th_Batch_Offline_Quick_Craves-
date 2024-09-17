@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">

        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">Edit Category</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-dark">
                            < Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $category->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="show_at_home">Show At Home</label>
                        <select class="form-control" name="show_at_home" id="show_at_home">
                            <option @selected($category->show_at_home == 1) value="1" selected>Yes</option>
                            <option @selected($category->show_at_home == 0) value="0">No</option>
                        </select>
                        @error('show_at_home')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option @selected($category->status == 1) value="1" selected>Active</option>
                            <option @selected($category->status == 0) value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </section>
@endsection
