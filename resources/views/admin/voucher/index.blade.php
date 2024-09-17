@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row mt-3">
                    <h1 class="col">Vouchers</h1>
                    <div class="card-header-action col text-end">
                        <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary">
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

    @include('admin.voucher.modal.status')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush