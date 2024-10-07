@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">All Menu Items</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.menu-item.create') }}" class="btn btn-primary">
                            Create new
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
