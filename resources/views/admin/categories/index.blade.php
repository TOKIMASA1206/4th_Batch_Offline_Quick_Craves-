@extends('admin.layouts.app')

@section('content')
    <div class="tab-pane fade show active" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab">
        <section class="section">

            <div class="card card-primary">
                <div class="card-header">
                    <div class="row mt-3">
                        <h1 class="col">All Categories</h1>
                        <div class="card-header-action col text-end">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
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
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
