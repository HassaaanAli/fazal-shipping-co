@extends('layouts.app')

@section('title', 'Importer')

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Importer</h3>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="javascript:void(0);" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                        <em class="icon ni ni-more-v"></em>
                    </a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('importer.create') }}" class="btn btn-primary" ajax-modal>
                                    <em class="icon ni ni-plus"></em>
                                    <span>Create New Importer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle table-responsive">
                    @if (session('message'))
                    <div class="alert alert-success can-hide">
                        {{ session('message') }}
                    </div>
                @endif
                    <table id="importer-dt" class="table nowrap nk-tb-list nk-tb-ulist dataTable no-footer" width="100%">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th><span class="sub-text">#</span></th>
                                <th><span class="sub-text">Company Name</span></th>
                                <th><span class="sub-text">Name</span></th>
                                <th><span class="sub-text text-right">Actions</span></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var table = $('#importer-dt').DataTable({
            processing: true,
            serverSide: true,
            scrollX: false,
            ordering: false,
            autoWidth: true,
            ajax: "{{ route('importer-dt') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'uuid',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            createdRow: function(row, data, index) {
                $(row).addClass('nk-tb-item');
            }
        });
    </script>
@endpush
