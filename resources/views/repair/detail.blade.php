@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'ข้อมูลครุภัณฑ์ |')

@section('head')
    <!-- Lightbox -->
    <link rel="stylesheet" href="{{ url('vendors/lightbox/magnific-popup.css') }}" type="text/css">

    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">

@endsection

@section('content')

@foreach ($repairs as $data)

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }} @if ($data->status == 9) <font color="red"><b>*** จำหน่ายแล้ว ***</b></font> @endif</h3>
            <div class="dropdown">
                @guest
                    <a href="javascript:window.print()" class="btn btn-outline-info">
                        <i class="ti-printer mr-2"></i> พิมพ์
                    </a>
                @else
                    {{-- @if ($data->durable_id > "99999999") --}}
                    {{-- @else --}}
                    <a href="{{ route('durable.show', $data->durable_id) }}" class="btn btn-outline-info">
                        <i class="ti-alert mr-2"></i> ดูประวัติครุภัณฑ์
                    </a>
                    {{-- @endif --}}

                    @if (Auth::user()->isadmin <= "1" OR Auth::user()->isadmin == "4")
                            @if ($data->repair_reciev_date == NULL)
                                <a class="btn btn-outline-warning" onclick="successConfirm()">
                                    <i class="mr-2" data-feather="tool"></i> ช่างรับซ่อม
                                </a>
                            @else
                                <a class="btn btn-outline-success" data-toggle="modal" data-target="#repairingModal">
                                    <i class="mr-2" data-feather="tool"></i> บันทึกการซ่อม
                                </a>
                            @endif

                            {{-- <a href="javascript:window.print()" class="btn btn-outline-info">
                                <i class="ti-printer mr-2"></i> พิมพ์
                            </a> --}}
                    @else
                        @if ($data->repair_reciev_date == NULL)
                        @else
                            <a class="btn btn-warning text-white">
                                <i class="mr-2" data-feather="tool"></i> ช่างรับแล้ว
                            </a>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-with-border d-flex align-items-center" role="alert">
        <i class="ti-check mr-2"></i> {{ $message }}
    </div>
    @endif
    @if ($message = Session::get('unsuccess'))
    <div class="alert alert-secondary alert-with-border d-flex align-items-center" role="alert">
        <i class="ti-close mr-2"></i> {{ $message }}
    </div>
    @endif
    @if ($message = Session::get('repairsuccess'))
    <div class="alert alert-success alert-with-border d-flex align-items-center" role="alert">
        <i class="ti-check mr-2"></i> {{ $message }} {{ linemessage($message) }}
    </div>

    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">รายละเอียดการส่งซ่อม</h4>
                                    <dl class="row">
                                        <dt class="col-sm-3">ผู้ส่งซ่อม</dt>
                                        <dd class="col-sm-9">{{ $data->repair_user }}</dd>

                                        <dt class="col-sm-3">วันที่ส่งซ่อม</dt>
                                        <dd class="col-sm-9">{{ $data->repair_date }}</dd>

                                        <dt class="col-sm-3">ปัญหา/สาเหตุ</dt>
                                        <dd class="col-sm-9"><h5>{{ $data->repair_text }}</h5></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="slider-for">
                                <div class="slick-slide-item">
                                    <p>ภาพประกอบ</p>
                                    @if ($data->repair_image == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded responsive" alt="">
                                    @else
                                    <a class="image-popup" href="{{ url('images/repair/'.$data->repair_image) }}">
                                    <img src="{{ url('images/repair/'.$data->repair_image) }}" class="img-fluid rounded responsive" alt="">
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($data->durable_id > "99999999")

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">รายการส่งซ่อม</p>
                            </div>
                            <h5>{{ $data->durable_desc }}</h5>
                        </div>

                        @else

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">ข้อมูลครุภัณฑ์</p>
                                <span class="d-flex align-items-center">
                                ID:{{ $data->id }}
                            </span>
                            </div>
                            @if ($data->status == 9) <h2><font color="red"><b>*** จำหน่ายแล้ว ***</b></font></h2> @endif
                            <h2>{{ $data->pass_number }}</h2>
                            <h4>{{ $data->pass_name }}</h4>
                            <p>
                                @if ($data->status == 9)
                                    <span class="badge bg-danger">จำหน่ายแล้ว {{ DateThaiFullNotNull($data->status9_date) }}</span>
                                @elseif ($data->status == 4)
                                    <span class="badge bg-danger-gradient text-white">ขอจำหน่าย {{ DateThaiFullNotNull($data->status4_date) }}</span>
                                @elseif ($data->status == 3)
                                    <span class="badge bg-warning">ชำรุด</span><span class="badge"><font color="red">{{ $data->repair_status }}</font></span>
                                @elseif ($data->status == 2)
                                    <span class="badge bg-primary-bright text-primary">อยู่ระหว่างการสำรวจ</span>
                                @elseif ($data->status == 1)
                                    <span class="badge bg-success-bright text-success">ยังใช้งานอยู่</span>
                                @else
                                    <span class="badge bg-light">อยู่ระหว่างการสำรวจ</span>
                                @endif
                                @isset($data->updated_at)
                                    <span class="badge text-primary">(ปรับปรุงล่าสุด : {{ DateThaiShortYY($data->updated_at->format('Y-m-d')) }} เวลา {{ TimeThai($data->updated_at->format('H:i:s')) }} น.)</span>
                                @endisset
                            </p>

                            <p>รายละเอียด:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check mr-2 @if ($data->model == NULL) text-light @else text-success @endif"></i>
                                    ยี่ห้อ/โมเดล/รุ่น : <b>{{ $data->model }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->serial_no == NULL) text-light @else text-success @endif"></i>
                                    Serial number : <b>{{ $data->serial_no }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->type_name_fasgrp == NULL) text-light @else text-success @endif"></i>
                                    ประเภท : <b>{{ $data->type_name_fasgrp }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->life == NULL) text-light @else text-success @endif"></i>
                                    อายุใช้งาน : <b>{{ $data->life }}</b> ปี {{--(Rate {{ $data->rate }})--}}
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->str_date == NULL) text-light @else text-success @endif"></i>
                                    วันที่ได้มา : <b>{{ DateThaiFull($data->str_date) }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->pass_price == NULL) text-light @else text-success @endif"></i>
                                    ราคา : <b>{{ number_format($data->pass_price,2) }}</b> บาท
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->company == NULL) text-light @else text-success @endif"></i>
                                    ซื้อจาก : <b>{{ $data->company }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->money_name == NULL) text-light @else text-success @endif"></i>
                                    แหล่งงบประมาณ : <b>{{ $data->money_name }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->docno == NULL) text-light @else text-success @endif"></i>
                                    เลขที่เอกสาร : <b>{{ $data->docno }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($data->dep_name == NULL) text-light @else text-success @endif"></i>
                                    ใช้ประจำที่ : <b>{{ $data->dep_name }}</b>
                                </li>
                                @foreach ($setting as $setting)
                                @php
                                    $module3 = $setting->module3;
                                @endphp
                                @endforeach
                                @if($module3 == 1)
                                <li><i class="fa fa-check mr-2 @if ($data->locationgps == NULL) text-light @else text-success @endif"></i>
                                    พิกัด GPS : <a target="_blank" href="https://www.google.co.th/maps/&#64;{{ $data->locationgps }},18z?hl=th">คลิกดูแผนที่ <i class="ti-location-pin mr-2"></i></a>
                                </li>
                                @endif
                                <li><i class="fa fa-check mr-2 @if ($data->memo_text == NULL) text-light @else text-success @endif"></i>
                                    <u>หมายเหตุ</u> : <p><small>{!! $data->memo_text !!}</small></p>
                                </li>

                            </ul>

                        </div>

                        @endif

                    </div>
                </div>
            </div>

            <p class="m-t-b-0" style='page-break-after:always'></p>
            <form id="confirmForm" class="form form-horizontal" action="{{ route('repair.update', $data->id) }}" method="POST" enctype="multipart/form-data" id="upload-image">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="repairid" value="{{ $repairid }}">
                    <input type="hidden" name="durable_id" value="{{ $data->durable_id }}">
                    <input type="hidden" name="durable_desc" value="{{ $data->durable_desc }}">
                    <input type="hidden" name="repair_status" value="2">
                    <input type="hidden" name="repair_reciev_date" value="{{ date("Y-m-d H:i:s") }}">
                    <input type="hidden" name="repair_reciev_user" value="{{ Auth::user()->name }}">
                </div>
            </form>

@endforeach

        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="repairingModal">
        <div class="modal-dialog" role="document" aria-hidden="true">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">บันทึกการซ่อม</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
                <i class="ti-close"></i>
              </button>
            </div>
            <form class="form form-horizontal" action="{{ route('repairfinish') }}" method="POST" enctype="multipart/form-data" id="upload-image">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- <h3>@foreach ($durable as $data) {{ $data->pass_number }} @endforeach</h3> --}}
                    {{-- <p>@foreach ($durable as $data) {{ $data->pass_name }} {{ $data->model }} @endforeach</p> --}}
                    <p>ช่างผู้ซ่อม:
                        <input type="hidden" name="repairid" value="{{ $repairid }}">
                        <input type="hidden" name="durable_id" value="{{ $data->durable_id }}">
                        <input type="hidden" name="durable_desc" value="{{ $data->durable_desc }}">
                        <input type="hidden" name="repair_status" value="3">
                        <input type="hidden" name="repair_finish_date" value="{{ date("Y-m-d H:i:s") }}">
                        <input type="hidden" name="repair_finish_user" value="{{ Auth::user()->name }}">
                    </p>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">รายละเอียดการซ่อม:</label>
                        <textarea class="form-control" id="repair_finish_text" name="repair_finish_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">มูลค่าการซ่อม:</label>
                        <input type="number" step="any" class="form-control" id="repair_price" name="repair_price">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึกการซ่อม</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')

    <!-- Lightbox -->
    <script src="{{ url('vendors/lightbox/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/lightbox.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ url('vendors/slick/slick.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/pages/product-detail.js') }}"></script>
    <!-- Toast examples -->
    <script src="{{ url('assets/js/examples/toast.js') }}"></script>
    <!-- Prism -->
    {{-- <script src="{{ url('vendors/prism/prism.js') }}"></script> --}}

    <script>
        function successConfirm() {
            $(document).ready(function(){
            swal({
            title: "ยืนยันรับซ่อมรายการนี้?",
            text: "เมื่อยืนยันแล้ว รายการนี้จะเข้าระบบการซ่อมบำรุง!",
            icon: "info",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("ข้อมูลผู้ใช้ถูกลบแล้ว", {
                    //     icon: "error",
                    // });
                    document.getElementById("confirmForm").submit();
                } else {
                    // swal("คุณเปลี่ยนใจ! ข้อมูลผู้ใช้นี้ยังคงอยู่", {
                    //     icon: "success",
                    // });
                }
            });

        });
        }

        function finishConfirm() {
            $(document).ready(function(){
            swal({
            title: "บันทึกรายละเอียดการซ่อม",
            text: "เมื่อบันทึกแล้ว รายการนี้จะถูกเปลี่ยนสถานะเป็นพร้อมใช้งาน!",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById("confirmFinishForm").submit();
                } else {
                }
            });

        });
        }

    </script>

    @if ($message = Session::get('unsuccess'))
    <script>
        $(document).ready(function(){
            swal("ขออภัย!", "{{ $message }}", "error");
        });
    </script>
    @endif
    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function(){
            swal("สำเร็จ!", "{{ $message }}", "success");
        });
    </script>

    @endif
@endsection
