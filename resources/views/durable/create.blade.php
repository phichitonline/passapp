@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'แก้ไขข้อมูลครุภัณฑ์ |')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">

@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3></h3>
            <div class="dropdown">
                <a href="#" onclick="goBack()" class="btn btn-outline-warning">
                    <i class="ti-control-backward mr-2"></i> กลับ
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('durable.store') }}" method="POST" enctype="multipart/form-data" id="upload-image">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="slider-for">
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg1"/>
                                </div>
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg2"/>
                                </div>
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg3"/>
                                </div>
                            </div>
                            <div class="slider-nav mt-4">
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg11"/>
                                </div>
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg22"/>
                                </div>
                                <div class="slick-slide-item">
                                    <img src="{{ url('assets/media/image/products/noimage.png') }}" class="img-fluid rounded" alt="" id="showimg33"/>
                                </div>
                            </div>
                            <div class="mb-4"></div>

                            <div class="form-group">
                                <label>
                                    อับโหลดภาพ 1
                                </label>
                                <div class="input-group">
                                    <input class="form-control text-red" type="file" name="image" id="image" accept="image/*" onchange="loadFile1(event)">
                                    @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    อับโหลดภาพ 2
                                </label>
                                <div class="input-group">
                                    <input class="form-control text-red" type="file" name="image2" id="image2" accept="image/*" onchange="loadFile2(event)">
                                    @error('image2')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message2 }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    อับโหลดภาพ 3
                                </label>
                                <div class="input-group">
                                    <input class="form-control text-red" type="file" name="image3" id="image3" accept="image/*" onchange="loadFile3(event)">
                                    @error('image3')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message3 }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5"></div>
                            <div class="form-group">
                                <label>
                                    อับโหลดไฟล์คู่มือ PDF
                                </label>
                                <div class="input-group">
                                    <input class="form-control text-red" type="file" name="manual_file" placeholder="เลือกไฟล์คู่มือ PDF" id="manual_file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    ลิงก์ภายนอก (Youtube/Google Drive ...)
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="manual_link" placeholder="ใส่ลิงก์ URL http://" id="manual_link">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">

                            <div class="form-group row">
                                <label for="type_name_fasgrp1" class="col-sm-2 col-form-label text-md-right">ประเภท</label>
                                <div class="col-sm-6">
                                    <select id="fasgrp" name="fasgrp" class="js-example-basic-single">
                                        @foreach ($typefasgrp as $typefasgrp)
                                        <option value="{{ $typefasgrp->id }}">{{ $typefasgrp->type_name_fasgrp }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="type_name_fasgrp2" class="col-sm-2 col-form-label text-md-right">ชนิด</label>
                                <div class="col-sm-6">
                                    <select id="fasgrp2" name="fasgrp2" class="js-example-basic-single">
                                        <option value="1">ชนิดครุภัณฑ์</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_name_fasgrp3" class="col-sm-2 col-form-label text-md-right">กลุ่ม</label>
                                <div class="col-sm-6">
                                    <select id="fasgrp3" name="fasgrp3" class="js-example-basic-single">
                                        <option value="1">กลุ่มครุภัณฑ์</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="pass_number" class="col-sm-2 col-form-label text-md-right">เลขครุภัณฑ์</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="text" class="form-control" id="pass_number" name="pass_number" placeholder="เลขครุภัณฑ์" value="{{ old('pass_number') }}">
                                    @error('pass_number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass_name" class="col-sm-2 col-form-label text-md-right">ชื่อ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pass_name" name="pass_name" placeholder="ชื่อครุภัณฑ์" value="{{ old('pass_name') }}">
                                    @error('pass_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="model" class="col-sm-2 col-form-label text-md-right">ยี่ห้อ/โมเดล/รุ่น</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="model" name="model" placeholder="ยี่ห้อ/โมเดล/รุ่น">
                                    @error('model')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="serial_no" class="col-sm-2 col-form-label text-md-right">Serial number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="serial_no" name="serial_no" placeholder="Serial number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="life" class="col-sm-2 col-form-label text-md-right">อายุการใช้งาน</label>
                                <div class="col-sm-2">
                                    <input type="number" step="any" class="form-control text-md-right" id="life" name="life" placeholder="อายุการใช้งาน">
                                </div>
                                <label for="life" class="col-sm-2 col-form-label">ปี</label>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="rate" class="col-sm-2 col-form-label text-md-right">Rate</label>
                                <div class="col-sm-2">
                                    <input type="number" step="any" class="form-control text-md-right" id="rate" name="rate" placeholder="Rate">
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="str_date" class="col-sm-2 col-form-label text-md-right">วันที่ได้มา</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="str_date" name="str_date" placeholder="วันที่ได้มา" value="{{ old('str_date') }}">
                                    @error('str_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass_price" class="col-sm-2 col-form-label text-md-right">ราคา</label>
                                <div class="col-sm-3">
                                    <input type="number" step="any" class="form-control text-md-right" id="pass_price" name="pass_price" placeholder="ราคา">
                                    @error('pass_price')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="life" class="col-sm-2 col-form-label">บาท</label>
                            </div>
                            <div class="form-group row">
                                <label for="company" class="col-sm-2 col-form-label text-md-right">ซื้อจาก</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="ซื้อจาก">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-form-label col-sm-2 pt-0 text-md-right">แหล่งงบประมาณ</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="str1"
                                                    id="str11" value="1">
                                            <label class="form-check-label" for="str11">
                                                เงินงบประมาณ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="str1"
                                                    id="str12" value="2">
                                            <label class="form-check-label" for="str12">
                                                เงินบำรุง
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="str1"
                                                    id="str13" value="3">
                                            <label class="form-check-label" for="str13">
                                                เงินบริจาค
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="str1"
                                                    id="str14" value="4">
                                            <label class="form-check-label" for="str14">
                                                เงินงบค่าเสื่อม
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label for="docno" class="col-sm-2 col-form-label text-md-right">เลขที่เอกสาร</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="docno" name="docno" placeholder="เลขที่เอกสาร">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="depcode" class="col-sm-2 col-form-label text-md-right">ใช้ประจำที่</label>
                                <div class="col-sm-6">
                                    <select id="depcode" name="depcode" class="js-example-basic-single">
                                        @foreach ($department as $department)
                                        <option value="{{ $department->depcode }}">{{ $department->dep_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="status" value="1">
                                </div>
                            </div>
                            @foreach ($setting as $data)
                            @php
                                $module3 = $data->module3;
                            @endphp
                            @endforeach
                            @if($module3 == 1)
                            <div class="form-group row">
                                <label for="locationgps" class="col-sm-2 col-form-label text-md-right">พิกัด GPS</label>
                                <div class="col-sm-6">
                                    <input onclick="getLocation()" type="text" class="form-control" id="locationPoint1" placeholder="พิกัด GPS" disabled>
                                    <input type="hidden" class="form-control" id="locationPoint" name="locationgps">
                                </div>
                                <div class="col-sm-4">
                                    <a onclick="getLocation()" class="btn btn-secondary text-white"><i class="ti-location-pin mr-2"></i> คลิกอ่านพิกัด GPS</a>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="memo_text" class="col-sm-2 col-form-label text-md-right">หมายเหตุ</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" id="memo_text" name="memo_text" placeholder="หมายเหตุ"></textarea>
                                </div>
                            </div>

                            <div class="form-group row text-md-right d-print-none">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function goBack() {
          window.history.back();
        }
    </script>

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

@endsection
