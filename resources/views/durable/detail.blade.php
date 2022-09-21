@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'ข้อมูลครุภัณฑ์ |')

@section('head')
    <!-- Lightbox -->
    <link rel="stylesheet" href="{{ url('vendors/lightbox/magnific-popup.css') }}" type="text/css">

    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

@endsection

@section('content')

@foreach ($durable as $data)

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }} @if ($data->status == 9) <font color="red"><b>*** จำหน่ายแล้ว ***</b></font> @endif</h3>
            <div class="dropdown">
                @guest
                    <a href="javascript:window.print()" class="btn btn-outline-info">
                        <i class="ti-printer mr-2"></i> พิมพ์
                    </a>
                @else
                    @if (Auth::user()->isadmin <= "1")
                            <a target="_blank" href="/printpreview/?id={{ $data->id }}" class="btn btn-outline-info">
                                <i class="ti-printer mr-2"></i> พิมพ์ Sticker
                            </a>
                            {{-- <a href="javascript:window.print()" class="btn btn-outline-info">
                                <i class="ti-printer mr-2"></i> พิมพ์
                            </a> --}}
                            <a class="btn btn-outline-warning" data-toggle="modal" data-target="#repairModal">
                                <i class="mr-2" data-feather="tool"></i> แจ้งซ่อม
                            </a>
                            <a href="{{ route('durable.edit', $data->id) }}" class="btn btn-outline-warning">
                                <i class="ti-pencil-alt mr-2"></i> แก้ไข
                            </a>
                    @else
                        <a class="btn btn-outline-warning" data-toggle="modal" data-target="#repairModal">
                            <i class="mr-2" data-feather="tool"></i> แจ้งซ่อม
                        </a>
                        <a target="_blank" href="/printpreview/?id={{ $data->id }}" class="btn btn-outline-info">
                            <i class="ti-printer mr-2"></i> พิมพ์ Sticker
                        </a>
                        {{-- <a href="javascript:window.print()" class="btn btn-outline-info">
                            <i class="ti-printer mr-2"></i> พิมพ์
                        </a> --}}
                        {{-- <a href="{{ route('durable.edit', $data->id) }}" class="btn btn-outline-warning">
                            <i class="ti-pencil-alt mr-2"></i> แก้ไข
                        </a> --}}
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
        <i class="ti-check mr-2"></i> {{ $message }}
        @foreach ($setting as $data)
            @if ($data->module5 == 1)
                {{ linemessage($data->linetoken,$message) }}
            @endif
        @endforeach
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            {{-- <p class="m-t-b-0" style='page-break-after:always'></p> --}}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider-for">
                                <div class="slick-slide-item">
                                    @if ($data->image_filename == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded responsive" alt="">
                                    @else
                                    <a class="image-popup" href="{{ url('images/duraimg/'.$data->image_filename) }}">
                                    <img src="{{ url('images/duraimg/'.$data->image_filename) }}" class="img-fluid rounded responsive" alt="">
                                    </a>
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($data->image_filename2 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded responsive" alt="">
                                    @else
                                    <a class="image-popup" href="{{ url('images/duraimg/'.$data->image_filename2) }}">
                                    <img src="{{ url('images/duraimg/'.$data->image_filename2) }}" class="img-fluid rounded responsive" alt="">
                                    </a>
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($data->image_filename3 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded responsive" alt="">
                                    @else
                                    <a class="image-popup" href="{{ url('images/duraimg/'.$data->image_filename3) }}">
                                    <img src="{{ url('images/duraimg/'.$data->image_filename3) }}" class="img-fluid rounded responsive" alt="">
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="slider-nav mt-4">
                                <div class="slick-slide-item">
                                    @if ($data->image_filename == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="">
                                    @else
                                    <img src="{{ url('images/duraimg/'.$data->image_filename) }}" class="img-fluid rounded" alt="">
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($data->image_filename2 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="">
                                    @else
                                    <img src="{{ url('images/duraimg/'.$data->image_filename2) }}" class="img-fluid rounded" alt="">
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($data->image_filename3 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="">
                                    @else
                                    <img src="{{ url('images/duraimg/'.$data->image_filename3) }}" class="img-fluid rounded" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">เลขครุภัณฑ์</p>
                                <span class="d-flex align-items-center">
                                {{-- <i class="fa fa-heart text-danger mr-2"></i> --}}
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
                                <li><i class="fa fa-check mr-2 @if ($data->locationgps == NULL) text-light @else text-success"></i>
                                    พิกัด GPS : <a target="_blank" href="https://www.google.co.th/maps/&#64;{{ $data->locationgps }},18z?hl=th">คลิกดูแผนที่ <i class="ti-location-pin mr-2"></i></a>
                                </li>@endif
                                @endif
                                <li><i class="fa fa-check mr-2 @if ($data->memo_text == NULL) text-light @else text-success @endif"></i>
                                    <u>หมายเหตุ</u> : <p><small>{!! $data->memo_text !!}</small></p>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <p class="m-t-b-0" style='page-break-after:always'></p>
            <div class="row">
                <div class="col-md-8">
                    <div class="media">
                        @php $genqrcode = config('app.url')."/search/".$data->id; @endphp

                        <div class="row">
                            <div class="align-self-start mr-3 text-center col-md-4">{!! QrCode::size(150)->generate($genqrcode) !!}<br>ID:{{ $data->id }}</div>
                            <div class="media-body col-md-8">
                                <h2><b>{{ $data->pass_number }}</b></h2>
                                <h5>วันที่ได้มา : <b>{{ DateThaiFull($data->str_date) }}</b></h5>
                                <h5>อายุใช้งาน : <b>{{ $data->life }} ปี</b> (Rate {{ $data->rate }})</h5>
                                <h5>ประเภท : {{ $data->type_name_fasgrp }}</h5>
                                <h3 class="mb-2">{{ $data->pass_name }}</h3>
                            </div>
                        </div>

                    </div>
                    <br>
                </div>
                <div class="col-md-4 text-right mb-3">
                    <a target="_blank" href="/printpreview/?id={{ $data->id }}" class="btn btn-outline-info">
                        <i class="ti-printer mr-2"></i> สำหรับพิมพ์ Sticker
                    </a>
                </div>
            </div> --}}
            <p class="m-t-b-0" style='page-break-after:always'></p>
@endforeach
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="manual-tab" data-toggle="tab" href="#manual" role="tab"
                               aria-controls="manual" aria-selected="true">คู่มือ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">ประวัติโอนย้าย ({{ $tranfer_count }})</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">ประวัติการซ่อม ({{ $repair_count }})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="manual" role="tabpanel" aria-labelledby="manual-tab">
                            <h4 class="mb-4">คู่มือ</h4>
                            <p class="font-weight-bold">
                                คู่มือการใช้งาน<br>
                                <a target="_blank" href="/manual/{{ $data->manual_file1 }}">{{ $data->manual_file1 }}</a><br>
                                ลิงก์อื่นๆ<br>
                                <a href="{{ $data->manual_link }}" target="_blank" rel="noopener noreferrer">{{ $data->manual_link }}</a>
                            </p>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h4 class="mb-4">ประวัติโอนย้าย</h4>
                            <div class="table-responsive">
                                <table id="example1" class="table table-small">
                                    <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>หน่วยงานเดิม</th>
                                        <th>หน่วยงานที่ย้ายไป</th>
                                        <th>ย้ายโดย</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transfers as $transfer)
                                        <tr>
                                            <td>{{ $transfer->created_at }}</td>
                                            <td>{{ $transfer->dep_name_old }}</td>
                                            <td>{{ $transfer->dep_name }}</td>
                                            <td>{{ $transfer->username }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <h4 class="mb-4">ประวัติการซ่อม</h4>
                            <div class="table-responsive">
                                <table id="example2" class="table table-small">
                                    <thead>
                                    <tr>
                                        <th>วันที่ส่งซ่อม</th>
                                        <th>สาเหตุหรืออาการ</th>
                                        <th>ผู้ส่งซ่อม</th>
                                        <th>วันที่รับงาน</th>
                                        <th>ช่างรับงาน</th>
                                        <th>วันที่ซ่อมเสร็จ</th>
                                        <th>ช่างรายงาน</th>
                                        <th>มูลค่าการซ่อม</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($repairs as $repair)
                                        <tr>
                                            <td>{{ $repair->repair_date }}</td>
                                            <td>{{ $repair->repair_text }}</td>
                                            <td>{{ $repair->repair_user }}</td>
                                            <td>{{ $repair->repair_reciev_date }}</td>
                                            <td>{{ $repair->repair_reciev_user }}</td>
                                            <td>{{ $repair->repair_finish_date }}</td>
                                            <td>{{ $repair->repair_finish_user }}</td>
                                            <td>{{ $repair->repair_price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="repairModal">
        <div class="modal-dialog" role="document" aria-hidden="true">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">แจ้งซ่อม</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
                <i class="ti-close"></i>
              </button>
            </div>
            <form class="form form-horizontal" action="{{ route('repair.store') }}" method="POST" enctype="multipart/form-data" id="upload-image">
                @csrf
                <div class="modal-body">
                    <h3>@foreach ($durable as $data) {{ $data->pass_number }} @endforeach</h3>
                    <p>@foreach ($durable as $data) {{ $data->pass_name }} {{ $data->model }} @endforeach</p>
                    <p>ผู้แจ้งซ่อม:
                        @guest @else {{ Auth::user()->name }}
                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="durable_id" value="@foreach ($durable as $data) {{ $data->id }} @endforeach">
                        <input type="hidden" name="pass_number" value="@foreach ($durable as $data) {{ $data->pass_number }} @endforeach">
                        <input type="hidden" name="repair_user" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="repair_date" value="{{ date("Y-m-d H:i:s") }}">
                        <input type="hidden" name="repair_status" value="1">
                        @endguest
                    </p>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ระบุรายละเอียด ปัญหา หรือสาเหตุการส่งซ่อม:</label>
                        <textarea class="form-control" id="repair_text" name="repair_text" required></textarea>
                    </div>

                    <div class="slick-slide-item">
                        <img src="" class="img-fluid rounded" alt="" id="showimg1"/>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ภาพถ่ายจุดที่ชำรุด:</label>
                        <input class="form-control text-red" type="file" name="image" accept="image/*" onchange="loadFile1(event)">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ส่งซ่อม</button>
                    </div>
                </div>
            </form>
        </div>
      </div>


    <script>
        var loadFile1 = function(event) {
            var showimg1 = document.getElementById('showimg1');
            showimg1.src = URL.createObjectURL(event.target.files[0]);
            showimg1.onload = function() {
                URL.revokeObjectURL(showimg1.src)
            }
        };
    </script>

@endsection

@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/datatable.js') }}"></script>

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
