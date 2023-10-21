@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'สำรวจข้อมูลครุภัณฑ์ |')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">

@endsection

@section('content')

@foreach ($durable as $durable)

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }} @if ($durable->status == 9) <font color="red"><b>*** จำหน่ายแล้ว ***</b></font> @endif</h3>
            <div class="dropdown">
            @guest
            @else
                @if (Auth::user()->isadmin <= "1")
                    <form id="deleteForm" action="{{ route('survey.destroy', $durable->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="image_del" value="{{ $durable->image_filename }}">
                        <input type="hidden" name="image2_del" value="{{ $durable->image_filename2 }}">
                        <input type="hidden" name="image3_del" value="{{ $durable->image_filename3 }}">
                        <input type="hidden" name="manual_file_del" value="{{ $durable->manual_file1 }}">
                        <input type="hidden" name="id" value="{{ $durable->id }}">
                    </form>
                    <a href="#" onclick="goBack()" class="btn btn-outline-warning">
                        <i class="ti-control-backward mr-2"></i> กลับ
                    </a>
                    {{-- <a href="#" class="btn btn-outline-danger" onclick="deleteConfirm()"><i class="ti-trash mr-2"></i> ลบ</a> --}}
                @else
                @endif
            @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="slider-for">
                                <div class="slick-slide-item">
                                    @if ($durable->image_filename == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg1"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename) }}" class="img-fluid rounded" alt="" id="showimg1"/>
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($durable->image_filename2 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg2"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename2) }}" class="img-fluid rounded" alt="" id="showimg2"/>
                                    @endif
                                </div>
                                <div class="slick-slide-item">
                                    @if ($durable->image_filename3 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg3"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename3) }}" class="img-fluid rounded" alt="" id="showimg3"/>
                                    @endif
                                </div>
                            </div>
                            <div class="slider-nav mt-4">
                                <div class="slick-slide-item" id="HideImage1">
                                    @if ($durable->image_filename == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg11"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename) }}" class="img-fluid rounded" alt="" id="showimg11"/>
                                    @endif
                                </div>
                                <div class="slick-slide-item" id="HideImage2">
                                    @if ($durable->image_filename2 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg22"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename2) }}" class="img-fluid rounded" alt="" id="showimg22"/>
                                    @endif
                                </div>
                                <div class="slick-slide-item" id="HideImage3">
                                    @if ($durable->image_filename3 == NULL)
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg33"/>
                                    @else
                                    <img src="{{ url('images/duraimg/'.$durable->image_filename3) }}" class="img-fluid rounded" alt="" id="showimg33"/>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4"></div>

                    <form class="form form-horizontal" action="{{ route('survey.update',$durable->id) }}" method="POST" enctype="multipart/form-data" id="upload-image">
                        @csrf
                        @method('PUT')

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                        @if ($durable->image_filename == NULL)
                                            อับโหลดภาพ 1
                                        @else
                                            อับโหลดภาพ 1 ใหม่
                                        @endif
                                        </label>
                                        <input type="hidden" name="image_del" value="{{ $durable->image_filename }}">
                                        <input type="hidden" name="imageold" value="{{ $durable->image_filename }}">
                                        <input class="form-control text-red" type="file" name="image" accept="image/*" onchange="loadFile1(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group form-check form-check-inline mt-4">
                                            <input onclick="myFunctionHideImg1()" class="form-check-input mt-2" type="checkbox" id="imgdel1" name="imgdel1" value="Y">
                                            <label class="form-check-label mt-1" for="imgdel1">ลบ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                        @if ($durable->image_filename2 == NULL)
                                            อับโหลดภาพ 2
                                        @else
                                            อับโหลดภาพ 2 ใหม่
                                        @endif
                                        </label>
                                        <input type="hidden" name="image2_del" value="{{ $durable->image_filename2 }}">
                                        <input type="hidden" name="image2old" value="{{ $durable->image_filename2 }}">
                                        <input class="form-control text-red" type="file" name="image2" accept="image/*" onchange="loadFile2(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group form-check form-check-inline mt-4">
                                            <input onclick="myFunctionHideImg2()" class="form-check-input mt-2" type="checkbox" id="imgdel2" name="imgdel2" value="Y">
                                            <label class="form-check-label mt-1" for="imgdel2">ลบ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                        @if ($durable->image_filename3 == NULL)
                                            อับโหลดภาพ 3
                                        @else
                                            อับโหลดภาพ 3 ใหม่
                                        @endif
                                        </label>
                                        <input type="hidden" name="image3_del" value="{{ $durable->image_filename3 }}">
                                        <input type="hidden" name="image3old" value="{{ $durable->image_filename3 }}">
                                        <input class="form-control text-red" type="file" name="image3" accept="image/*" onchange="loadFile3(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group form-check form-check-inline mt-4">
                                            <input onclick="myFunctionHideImg3()" class="form-check-input mt-2" type="checkbox" id="imgdel3" name="imgdel3" value="Y">
                                            <label class="form-check-label mt-1" for="imgdel3">ลบ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5"></div>
                            <div class="form-group">
                                <label>
                                    <a target="_blank" href="/manual/{{ $durable->manual_file1 }}">{{ $durable->manual_file1 }}</a>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>
                                        @if ($durable->manual_file1 == NULL)
                                            อับโหลดไฟล์คู่มือ PDF
                                        @else
                                            อับโหลดไฟล์คู่มือ PDF ใหม่
                                        @endif
                                        </label>
                                        <input type="hidden" name="manual_file_del" value="{{ $durable->manual_file1 }}">
                                        <input type="hidden" name="manual_fileold" value="{{ $durable->manual_file1 }}">
                                        <input class="form-control text-red" type="file" name="manual_file" placeholder="เลือกไฟล์คู่มือ PDF" id="manual_file">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group form-check form-check-inline mt-4">
                                            <input class="form-check-input mt-2" type="checkbox" id="mandel1" name="mandel1" value="Y">
                                            <label class="form-check-label mt-1" for="mandel1">ลบ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            ลิงก์ภายนอก (Youtube/Google Drive ...)
                                        </label>
                                        <input class="form-control text-red" type="text" name="manual_link" placeholder="ใส่ลิงก์ URL http://" id="manual_link" value="{{ $durable->manual_link }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">เลขครุภัณฑ์</p>
                                <span class="d-flex align-items-center">
                                {{-- <i class="fa fa-heart text-danger mr-2"></i> --}}
                                ID:{{ $durable->id }}
                            </span>
                            </div>
                            @if ($durable->status == 9) <h2><font color="red"><b>*** จำหน่ายแล้ว ***</b></font></h2> @endif
                            <h2>{{ $durable->pass_number }}</h2>
                            <h4>{{ $durable->pass_name }}</h4>
                            <p>
                                @if ($durable->status == 9)
                                    <span class="badge bg-danger">จำหน่ายแล้ว {{ DateThaiFullNotNull($durable->status9_date) }}</span>
                                @elseif ($durable->status == 4)
                                    <span class="badge bg-danger-gradient text-white">ขอจำหน่าย {{ DateThaiFullNotNull($durable->status4_date) }}</span>
                                @elseif ($durable->status == 3)
                                    <span class="badge bg-warning">ชำรุด</span><span class="badge"><font color="red">{{ $durable->repair_status }}</font></span>
                                @elseif ($durable->status == 2)
                                    <span class="badge bg-primary-bright text-primary">อยู่ระหว่างการสำรวจ</span>
                                @elseif ($durable->status == 1)
                                    <span class="badge bg-success-bright text-success">ยังใช้งานอยู่</span>
                                @else
                                    <span class="badge bg-light">อยู่ระหว่างการสำรวจ</span>
                                @endif
                                @isset($durable->updated_at)
                                    <span class="badge text-primary">(ปรับปรุงล่าสุด : {{ DateThaiShortYY($durable->updated_at->format('Y-m-d')) }} เวลา {{ TimeThai($durable->updated_at->format('H:i:s')) }} น.)</span>
                                @endisset
                            </p>


                            <p>รายละเอียด:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check mr-2 @if ($durable->model == NULL) text-light @else text-success @endif"></i>
                                    ยี่ห้อ/โมเดล/รุ่น : <b>{{ $durable->model }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->serial_no == NULL) text-light @else text-success @endif"></i>
                                    Serial number : <b>{{ $durable->serial_no }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->type_name_fasgrp == NULL) text-light @else text-success @endif"></i>
                                    ประเภท : <b>{{ $durable->type_name_fasgrp }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->life == NULL) text-light @else text-success @endif"></i>
                                    อายุใช้งาน : <b>{{ $durable->life }}</b> ปี {{--(Rate {{ $durable->rate }})--}}
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->str_date == NULL) text-light @else text-success @endif"></i>
                                    วันที่ได้มา : <b>{{ DateThaiFull($durable->str_date) }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->pass_price == NULL) text-light @else text-success @endif"></i>
                                    ราคา : <b>{{ number_format($durable->pass_price,2) }}</b> บาท
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->company == NULL) text-light @else text-success @endif"></i>
                                    ซื้อจาก : <b>{{ $durable->company }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->money_name == NULL) text-light @else text-success @endif"></i>
                                    แหล่งงบประมาณ : <b>{{ $durable->money_name }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->get_name == NULL) text-light @else text-success @endif"></i>
                                    วิธีการที่ได้มา : <b>{{ $durable->get_name }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->docno == NULL) text-light @else text-success @endif"></i>
                                    เลขที่เอกสาร : <b>{{ $durable->docno }}</b>
                                </li>
                                <li><i class="fa fa-check mr-2 @if ($durable->dep_name == NULL) text-light @else text-success @endif"></i>
                                    ใช้ประจำที่ : <b>{{ $durable->dep_name }}</b>
                                </li>
                                @foreach ($setting as $setting)
                                @php
                                    $module3 = $setting->module3;
                                @endphp
                                @endforeach
                                @if($module3 == 1)
                                <li><i class="fa fa-check mr-2 @if ($durable->locationgps == NULL) text-light @else text-success"></i>
                                    พิกัด GPS : <a target="_blank" href="https://www.google.co.th/maps/&#64;{{ $durable->locationgps }},18z?hl=th">คลิกดูแผนที่ <i class="ti-location-pin mr-2"></i></a>
                                </li>@endif
                                @endif
                                <li><i class="fa fa-check mr-2 @if ($durable->memo_text == NULL) text-light @else text-success @endif"></i>
                                    <u>หมายเหตุ</u> : <p><small>{!! $durable->memo_text !!}</small></p>
                                </li>

                            </ul>


                            <div class="form-group row">
                                <label for="pass_number" class="col-sm-2 col-form-label text-md-right">เลขครุภัณฑ์</label>
                                <div class="col-sm-4">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $durable->id }}">
                                    <input type="hidden" class="form-control" id="durableid" name="durableid" value="{{ $durable->id }}">
                                    <input type="hidden" class="form-control" id="userid" name="userid" value="{{ Auth::user()->id }}">
                                    <input type="text" class="form-control" id="pass_number" name="pass_number" placeholder="เลขครุภัณฑ์" value="{{ $durable->pass_number }}">
                                </div>
                                <label for="life" class="col-sm-2 col-form-label">ID:{{ $durable->id }}</label>
                            </div>


                            <div class="form-group row">
                                <label for="depcode" class="col-sm-2 col-form-label text-md-right">ใช้ประจำที่</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="depcodeold" value="{{ $durable->depcode }}">
                                    <select id="depcode" name="depcode" class="js-example-basic-single">
                                        @foreach ($department as $department)
                                        <option value="{{ $department->depcode }}" @if ($department->depcode == $durable->depcode) selected @endif>{{ $department->dep_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" id="depcode" name="depcode" placeholder="ใช้ประจำที่" value="{{ $durable->depcode }}"> --}}
                                </div>
                            </div>

                            @if($module3 == 1)
                            <div class="form-group row">
                                <label for="locationgps" class="col-sm-2 col-form-label text-md-right">พิกัด GPS</label>
                                <div class="col-sm-6">
                                    <input onclick="getLocation()" type="text" class="form-control" id="locationPoint1" value="{{ $durable->locationgps }}" placeholder="พิกัด GPS" disabled>
                                    <input type="hidden" class="form-control" id="locationPoint" name="locationgps" value="{{ $durable->locationgps }}">
                                </div>
                                <div class="col-sm-4">
                                    <a onclick="getLocation()" class="btn btn-secondary text-white"><i class="ti-location-pin mr-2"></i> คลิกอ่านพิกัด GPS</a>
                                </div>
                            </div>
                            @endif

                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-sm-2 pt-0 text-md-right">สถานะ</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" onload="myFunctionHideDiv()" onclick="myFunctionHideDiv()" type="radio" name="status"
                                                    id="status1" value="1" @if ($durable->status == 1) checked @endif>
                                            <label class="form-check-label" for="status1">
                                                ยังใช้งานอยู่
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" onclick="myFunctionHideDiv()" type="radio" name="status"
                                                    id="status2" value="2" @if ($durable->status == 2) checked @endif>
                                            <label class="form-check-label" for="status2">
                                                ระหว่างการสำรวจ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" onclick="myFunctionHideDiv()" type="radio" name="status"
                                                    id="status3" value="3" @if ($durable->status == 3) checked @endif>
                                            <label class="form-check-label" for="status3">
                                                ชำรุด
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-check-input" onclick="myFunctionDiv4()" type="radio" name="status"
                                                        id="status4" value="4" @if ($durable->status == 4) checked @endif>
                                                    <label class="form-check-label" for="status4">
                                                        ขอจำหน่าย {{ DateThaiFullNotNull($durable->status4_date) }}
                                                    </label>
                                                </div>
                                                <div style="display:none" class="col-sm-6" id="status4_div">
                                                    <div class="row">
                                                        <label for="str_date" class="col-sm-3 col-form-label text-md-right">ระบุวันที่</label>
                                                        <div class="col-sm-6">
                                                            <input type="date" class="form-control" id="status4_date" name="status4_date" value="{{ $durable->status4_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-check-input" onclick="myFunctionDiv9()" type="radio" name="status"
                                                        id="status9" value="9" @if ($durable->status == 9) checked @endif>
                                                    <label class="form-check-label" for="status9">
                                                        จำหน่ายแล้ว {{ DateThaiFullNotNull($durable->status9_date) }}
                                                    </label>
                                                </div>
                                                <div style="display:none" class="col-sm-6" id="status9_div">
                                                    <div class="row">
                                                        <label for="str_date" class="col-sm-3 col-form-label text-md-right">ระบุวันที่</label>
                                                        <div class="col-sm-6">
                                                            <input type="date" class="form-control" id="status9_date" name="status9_date" value="{{ $durable->status9_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <label for="memo_text" class="col-sm-2 col-form-label text-md-right">หมายเหตุ</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" id="memo_text" name="memo_text" placeholder="หมายเหตุ">{{ $durable->memo_text }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="memo_survey" class="col-sm-2 col-form-label text-md-right">บันทึกการสำรวจ</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" id="memo_survey" name="memo_survey" placeholder=""></textarea>
                                </div>
                            </div>

                            <div class="form-group row text-md-right d-print-none">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> บันทึก</button>
                                </div>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endforeach

    <script>
        function myFunctionDiv4() {
          var x = document.getElementById("status4_div");
          var x2 = document.getElementById("status9_div");
            x.style.display = "block";
            x2.style.display = "none";
        }

        function myFunctionDiv9() {
          var x = document.getElementById("status9_div");
          var x2 = document.getElementById("status4_div");
            x.style.display = "block";
            x2.style.display = "none";
        }
        function myFunctionHideDiv() {
          var x = document.getElementById("status4_div");
          var x2 = document.getElementById("status9_div");
            x.style.display = "none";
            x2.style.display = "none";
        }
        function myFunctionHideImg1() {
          var x = document.getElementById("HideImage1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function myFunctionHideImg2() {
          var x = document.getElementById("HideImage2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function myFunctionHideImg3() {
          var x = document.getElementById("HideImage3");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <script>
        function goBack() {
          window.history.back();
        }
    </script>

    {{-- <img id="showimg1"/> --}}
    <script>
        var loadFile1 = function(event) {
            var showimg1 = document.getElementById('showimg1');
            showimg1.src = URL.createObjectURL(event.target.files[0]);
            showimg1.onload = function() {
                URL.revokeObjectURL(showimg1.src)
            }
            var showimg11 = document.getElementById('showimg11');
            showimg11.src = URL.createObjectURL(event.target.files[0]);
            showimg11.onload = function() {
                URL.revokeObjectURL(showimg11.src)
            }
        };
        var loadFile2 = function(event) {
            var showimg2 = document.getElementById('showimg2');
            showimg2.src = URL.createObjectURL(event.target.files[0]);
            showimg2.onload = function() {
                URL.revokeObjectURL(showimg2.src)
            }
            var showimg22 = document.getElementById('showimg22');
            showimg22.src = URL.createObjectURL(event.target.files[0]);
            showimg22.onload = function() {
                URL.revokeObjectURL(showimg22.src)
            }
        };
        var loadFile3 = function(event) {
            var showimg3 = document.getElementById('showimg3');
            showimg3.src = URL.createObjectURL(event.target.files[0]);
            showimg3.onload = function() {
                URL.revokeObjectURL(showimg3.src)
            }
            var showimg33 = document.getElementById('showimg33');
            showimg33.src = URL.createObjectURL(event.target.files[0]);
            showimg33.onload = function() {
                URL.revokeObjectURL(showimg33.src)
            }
        };
    </script>

    <script>
        var x = document.getElementById("locationPoint");
        var x1 = document.getElementById("locationPoint1");

        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        function showPosition(position) {
            x.value = position.coords.latitude + "," + position.coords.longitude;
            x1.value = position.coords.latitude + "," + position.coords.longitude;
        }
    </script>

@endsection

@section('script')

    <!-- Select2 -->
    <script src="{{ url('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/select2.js') }}"></script>

    <!-- Slick js -->
    <script src="{{ url('vendors/slick/slick.min.js') }}"></script>

    <script src="{{ url('assets/js/examples/pages/product-detail.js') }}"></script>

    <script>
        function deleteConfirm() {
            $(document).ready(function(){
                swal({
                    title: "คุณแน่ใจที่จะลบรายการนี้?",
                    text: "เมื่อลบแล้ว คุณจะไม่สามารถกู้คืนรายการนี้ได้!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById("deleteForm").submit();
                    } else {
                        // swal("คุณเปลี่ยนใจ! ข้อมูลรายการนี้ยังคงอยู่", {
                        //     icon: "success",
                        // });
                    }
                });

            });
        }

    </script>
@endsection
