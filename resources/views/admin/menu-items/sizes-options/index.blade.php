@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Choose Size & Options of ({{ $menuItem->name }})</h1>
        </div>

        <div>
            <a href="{{ route('admin.menu-item.index') }}" class="btn btn-primary my-3">Go Back</a>
        </div>

        <div class="row me-3">
            <div class="col-md-6">
                <div class="card card-primary mb-4">
                    <div class="card-header">
                        <h4>Create Menu Size</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.menuSize.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" id="" class="form-control">
                                        <input type="hidden" value="{{ $menuItem->id }}" name="menu_item_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Price</label>
                                        <input type="text" name="price" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>₱ {{ $size->price }}</td>
                                        <td colspan="2" >
                                            <a href="{{ route('admin.menuSize.edit', $size->id) }}"
                                                class='btn-yellow'>
                                                <i class='fa fa-edit'></i></a>
                                            <a href="{{ route('admin.menuSize.destroy', $size->id) }}"
                                                class='btn-red mx-2 delete-item'>
                                                <i class='fas fa-trash'></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($sizes) === 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary mb-4">
                    <div class="card-header">
                        <h4>Create Product Options</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.menuOption.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" id="" class="form-control">
                                        <input type="hidden" value="{{ $menuItem->id }}" name="menu_item_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Price</label>
                                        <input type="text" name="price" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $option->name }}</td>
                                        <td>₱ {{ $option->price }}</td>
                                        <td colspan="2">
                                            <a href="{{ route('admin.menuOption.edit', $option->id) }}"
                                                class='btn-yellow'>
                                                <i class='fa fa-edit'></i></a>
                                            <a href="{{ route('admin.menuOption.destroy', $option->id) }}"
                                                class='btn-red mx-2 delete-item'>
                                                <i class='fas fa-trash'></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($options) === 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
