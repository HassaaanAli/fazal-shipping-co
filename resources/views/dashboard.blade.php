@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .traffic-channel-group {
        width: 500px;
    }

    .traffic-channel-data {
        width: 33%;
    }

</style>
@endpush

@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Dashboard</h3>
                </div>
            </div>
        </div>
        <div class="row g-gs">
            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Companies</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Companies</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Importers</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Importers</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Users</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Jobs Pending</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Jobs Pending</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Completed Jobs</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Completed Jobs</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-2">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Total Jobs</h4>
                            </div>
                            <div class="col text-right">
                                <div class="card-subtitle mb-2">
                                    <h6 class="mt-2">Total Total Jobs</h6>
                                    <h3>24</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
