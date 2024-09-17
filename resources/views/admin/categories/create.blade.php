@extends('admin.layouts.app')

@section('content')
    <section class="section me-3">

        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">Create Category</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-dark">
                            < Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="show_at_home">Show At Home</label>
                        <select class="form-control" name="show_at_home" id="show_at_home">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('show_at_home')
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

                    <button class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </section>
@endsection
