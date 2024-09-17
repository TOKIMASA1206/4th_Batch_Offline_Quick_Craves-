@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Menu Item</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Menu Items</h4>
                <div class="card-header-action text-end">
                    <a href="{{ route('admin.menu-item.create') }}" class="btn btn-primary">
                        Create new
                    </a>
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
