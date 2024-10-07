@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h1>All Users</h1>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
