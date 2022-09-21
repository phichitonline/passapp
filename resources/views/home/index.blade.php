@extends('layouts.app')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')

@foreach ($dash_data as $data)
@php
    $c_buy1 = $data->c_buy1;
    $c_buy2 = $data->c_buy2;
    $buy_stat1 = $data->c_buy1 * 100 / $data->c_buy;
    $buy_stat2 = $data->c_buy2 * 100 / $data->c_buy;
    $c_budget = $data->c_budget;
    $c_budgetuse = $data->c_budgetuse;
    $use_thismonth = $data->use_thismonth;
    $budget_stat = $data->c_budgetuse * 100 / $data->c_budget;

    if ($data->c_budget > $data->c_budgetuse) {
        $budget_stat_color = "text-success";
        $budget_stat_ud = "ti-angle-down";
    } elseif ($data->c_budget < $data->c_budgetuse) {
        $budget_stat_color = "text-danger";
        $budget_stat_ud = "ti-angle-up";
    } else {
        $budget_stat_color = "text-primary";
        $budget_stat_ud = "ti-angle-down";
    }
@endphp
@endforeach

    <div class="page-header">
        <div class="page-title">
            <h3>ระบบงานจัดซื้อจัดจ้าง</h3>
            <div>
                <div class="btn btn-outline-light">
                    <i class="ti-calendar mr-2 text-muted"></i> {{ thaidate('วันlที่ j F พ.ศ.Y เวลา H.i น.') }}
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between">
                        งานจัดซื้อ
                        <small class="text-muted">ปี {{ thaidate('Y') }}</small>
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ number_format($c_buy1,0) }}</h2>
                            <small class="text-success">
                                <i class="ti-angle-up mr-1"></i>
                                2.00%
                            </small>
                        </div>
                        <div
                            class="icon-block icon-block-xl icon-block-floating bg-secondary opacity-7">
                            <i class="ti-bar-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between">
                        งานจ้าง
                        <small class="text-muted">ปี {{ thaidate('Y') }}</small>
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ number_format($c_buy2,0) }}</h2>
                            <small class="text-danger">
                                <i class="ti-angle-down mr-1"></i>
                                1.59%
                            </small>
                        </div>
                        <div class="icon-block icon-block-xl icon-block-floating bg-success opacity-7">
                            <i class="ti-package"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between">
                        งบประมาณใช้ไป
                        <small class="text-muted">ปี {{ thaidate('Y') }}</small>
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ number_format($c_budgetuse,2) }}</h2>
                            <small class="{{ $budget_stat_color }}">
                                <i class="{{ $budget_stat_ud }} mr-1"></i>
                                {{ number_format($budget_stat,2) }}%
                            </small>
                        </div>
                        <div class="icon-block icon-block-xl icon-block-floating bg-warning opacity-7">
                            <i class="ti-user"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title mb-3">สรุปงานจัดซื้อจัดจ้างรายเดือน</h6>
                            <h1>{{ number_format($c_budgetuse,2) }}</h1>
                        </div>
                        <div class="d-flex">
                            <div class="icon-block icon-block-floating bg-danger mr-2">
                                <i class="ti-arrow-up"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <small class="text-muted">Last 12 Months</small>
                                <div class="text-danger">+52,50%</div>
                            </div>
                        </div>
                    </div>
                    <div id="sales"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">คำขอปีนี้</h6>
                        <div>
                            <a href="#" class="btn btn-outline-light btn-sm btn-floating mr-2">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </div>
                    </div>
                    <div id="monthly-sales"></div>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <i class="fa fa-circle mr-1 text-success"></i> งานจัดซื้อ <br>
                            <small class="text-muted">{{ number_format($buy_stat1,2) }}%</small>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-circle mr-1 text-primary"></i> งานจ้าง <br>
                            <small class="text-muted">{{ number_format($buy_stat2,2) }}%</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h6 class="card-title">แผนงานโครงการ</h6>
                        <div>
                            <a href="#" class="btn btn-outline-light btn-sm btn-floating mr-2">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </div>
                    </div>
                    <p>งบประมาณรวม</p>
                    <h2 class="mb-4">500,000.00</h2>
                    <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-secondary" style="width: 30%" role="progressbar"></div>
                        <div class="progress-bar bg-info" style="width: 12%" role="progressbar"></div>
                        <div class="progress-bar bg-warning" style="width: 20%" role="progressbar"></div>
                        <div class="progress-bar bg-success" style="width: 18%" role="progressbar"></div>
                        <div class="progress-bar bg-danger" style="width: 20%" role="progressbar"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                แม่และเด็ก
                            </p>
                            <h5 class="mt-2 mb-0">30%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-info mr-1"></span>
                                ชุมชน
                            </p>
                            <h5 class="mt-2 mb-0">12%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-warning mr-1"></span>
                                โรคเรื้อรัง
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-success mr-1"></span>
                                อุบัติเหตุ
                            </p>
                            <h5 class="mt-2 mb-0">18%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                ป้องกันโรค
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card border-0 bg-info-bright">
                <div class="card-body">
                    <div class="text-center">
                        <p>เบิกจ่ายเดือนนี้</p>
                        <h2>{{ number_format($use_thismonth,2) }}</h2>
                        <p>สรุปการเบิกจ่ายงบประมาณ รวมทุกแผนงานโครงการของสำนักงาน</p>
                        <div class="mt-4">
                            <a href="#" class="btn btn-info">ดูรายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<!-- Apex chart -->
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="{{ url('/vendors/charts/apex/apexcharts.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ url('vendors/datepicker/daterangepicker.js') }}"></script>

<!-- DataTable -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

<!-- Dashboard scripts -->
<script src="{{ url('assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>
@endsection
