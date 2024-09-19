@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Size of ({{ $menuSize->menuItem->name }})</h1>
        </div>

        <div>
            <a href="{{ route('admin.menuSize.show', $menuSize->menuItem->id) }}" class="btn btn-primary my-3">Go Back</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary mb-4">
                    <div class="card-header">
                        <h4>Edit Menu Size</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.menuSize.update', $menuSize->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" id="" class="form-control" value="{{ $menuSize->name }}">
                                        <input type="hidden" value="{{ $menuSize->menuItem->id }}" name="menu_item_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Price</label>
                                        <input type="text" name="price" id="" class="form-control" value="{{ $menuSize->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
