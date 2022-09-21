@extends('layouts.app')
@section('title', 'โปรแกรมครุภัณฑ์ |')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">

@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>โปรแกรมครุภัณฑ์ | PassApp</h3>
            <div>
                <div class="btn btn-outline-light">
                    <i class="ti-calendar mr-2 text-muted"></i> {{ thaidate('วันlที่ j F พ.ศ.Y') }}
                    {{-- <i class="ti-calendar mr-2 text-muted"></i> {{ thaidate('วันlที่ j F พ.ศ.Y เวลา H.i น.') }} --}}
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
                        ครุภัณฑ์ทั้งหมด
                        {{-- <small class="text-muted">ปี {{ thaidate('Y') }}</small> --}}
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ $count_durable }}</h2>
                            <small class="text-success">
                                <i class="ti-angle-up mr-1"></i>
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
                        ครุภัณฑ์การแพทย์
                        {{-- <small class="text-muted">ปี {{ thaidate('Y') }}</small> --}}
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ $count_durable17 }}</h2>
                            <small class="text-primary">
                                <i class="ti-angle-down mr-1"></i>
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
                        ครุภัณฑ์คอมพิวเตอร์
                        {{-- <small class="text-muted">ปี {{ thaidate('Y') }}</small> --}}
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-3">{{ $count_durable18 }}</h2>
                            <small class="text-success">
                                <i class="ti-angle-up mr-1"></i>
                            </small>
                        </div>
                        <div class="icon-block icon-block-xl icon-block-floating bg-warning opacity-7">
                            <i class="ti-blackboard"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <!-- Dashboard scripts -->
    <script src="{{ url('assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>

    <!-- Toast examples -->
    <script src="{{ url('assets/js/examples/toast.js') }}"></script>

    @if ($message = Session::get('loginsuccess'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ $message }}');
        });
    </script>
    @endif
@endsection
