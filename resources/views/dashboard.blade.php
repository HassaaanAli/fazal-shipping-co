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
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="javascript:void(0);" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                <em class="icon ni ni-more-v"></em>
                            </a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <select class="form-control form-control-lg select2" id="campaign-select">
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block" id="charts">
                <div class="row g-gs">
                    <div class="col-7">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Campaign Overview</h6>
                                        <p>Impression/Click trend over time.</p>
                                    </div>
                                    <div class="card-tools">
                                    </div>
                                </div>
                                <div class="analytic-au">
                                    <div class="analytic-au-ck">
                                        <div class="d-flex justify-content-center h-75 spinner">
                                            <div class="spinner-border align-self-center">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <canvas class="analytics-au-chart" id="analyticAuData"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-5">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Countries</h6>
                                    </div>
                                    <div class="card-tools">
                                    </div>
                                </div>
                                <div class="traffic-channel">
                                    <div class="traffic-channel-doughnut-ck">
                                        <div class="d-flex justify-content-center h-75 spinner">
                                            <div class="spinner-border align-self-center">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <canvas class="analytics-doughnut" id="TrafficChannelDoughnutData"></canvas>
                                    </div>
                                    <div class="traffic-channel-group pl-5 g-2"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Campaign Spend Overview</h6>
                                        <p>Actual and average spend trend over time.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
    </div>
@endsection
