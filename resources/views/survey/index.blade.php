@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'สำรวจครุภัณฑ์ |')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

@endsection

@section('content')

@php
    if ($selecttype == "typefasgrp") {
        if ($status == 1) {
            $fasgrpstatus = "1";
            $departmentstatus = "9";
        } else {
            $fasgrpstatus = "9";
            $departmentstatus = "9";
        }
    } else {
        if ($status == 1) {
            $departmentstatus = "1";
            $fasgrpstatus = "9";
        } else {
            $departmentstatus = "9";
            $fasgrpstatus = "9";
        }
    }

@endphp

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }}</h3>
            @if (isset($_GET['keyword'])) <p class="card-title">ผลการค้นหา คำค้น "{{ $_GET['keyword'] }}"</p> @endif
            @guest
            @else
                @if (Auth::user()->isadmin <= "1")
                <a target="_blank" href="/printallpreview/?selecttype={{ $selecttype }}&keyword={{ $keyword }}&status={{ $status }}" class="btn btn-outline-info">
                    <i class="ti-printer mr-2"></i> พิมพ์ Sticker
                </a>
                @endif
            @endguest
        </div>
        <form action="{{ route('survey') }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-2 col-form-label text-right">ค้นด้วยประเภท :</div>
                <div class="col-md-4">
                    <select id="keyword1" name="keyword" class="js-example-basic-single">
                        @foreach ($typefasgrp as $typefasgrp)
                        <option value="{{ $typefasgrp->id }}" @if ($typefasgrp->id == $keyword) selected @endif>{{ $typefasgrp->type_name_fasgrp }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="selecttype" value="typefasgrp">
                </div>
                <div class="col-md-4 ml-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" @if($fasgrpstatus == 1) checked @endif>
                        <label class="custom-control-label mt-2 mr-2" for="status">เฉพาะที่ใช้งานอยู่</label>
                        <button type="submit" class="btn btn-primary"><i class="ti-check mr-2"></i> ตกลง</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('survey') }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-2 col-form-label text-right">ค้นด้วยหน่วยงาน :</div>
                <div class="col-md-4">
                    <select id="keyword" name="keyword" class="js-example-basic-single">
                        @foreach ($department as $department)
                        <option value="{{ $department->depcode }}" @if ($department->depcode == $keyword) selected @endif>{{ $department->dep_name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="selecttype" value="department">
                </div>
                <div class="col-md-4 ml-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="status2" name="status" value="1" @if($departmentstatus == 1) checked @endif>
                        <label class="custom-control-label mt-2 mr-2" for="status2">เฉพาะที่ใช้งานอยู่</label>
                        <button type="submit" class="btn btn-primary"><i class="ti-check mr-2"></i> ตกลง</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="ti-check mr-2"></i> {{ $message }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div>
                    <br>
                </div>
                <div class="table-responsive">
                    <table id="example1" class="table table-small">
                        <thead>
                        <tr>
                            <th>เลขครุภัณฑ์</th>
                            <th>รายการครุภัณฑ์</th>
                            <th>ประเภท</th>
                            <th>วันที่ได้รับ</th>
                            <th>ใช้ประจำที่</th>
                            <th>สถานะ</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($durable as $data)
                        @php
                        if ($data->status == 1) {
                            $dstatus = "ใช้งานอยู่";
                            $dcolor = "bg-success-bright text-success";
                            $ddel1 = "";
                            $ddel2 = "";
                        } else if ($data->status == 2) {
                            $dstatus = "อยู่ระหว่างการสำรวจ";
                            $dcolor = "bg-primary-bright text-primary";
                            $ddel1 = "";
                            $ddel2 = "";
                        } elseif ($data->status == 3) {
                            $dstatus = "ชำรุด";
                            $dcolor = "bg-warning";
                            $ddel1 = "<font color='gray'>";
                            $ddel2 = "</font>";
                        } elseif ($data->status == 4) {
                            $dstatus = "ขอจำหน่าย";
                            $dcolor = "bg-danger-gradient text-white";
                            $ddel1 = "";
                            $ddel2 = "";
                        } elseif ($data->status == 9) {
                            $dstatus = "จำหน่ายแล้ว";
                            $dcolor = "bg-danger";
                            $ddel1 = "<del>";
                            $ddel2 = "</del>";
                        } else {
                            $dstatus = "อยู่ระหว่างการสำรวจ";
                            $dcolor = "bg-light";
                            $ddel1 = "";
                            $ddel2 = "";
                        }
                        @endphp
                        <tr>
                            <td><a href="{{ route('search.show', $data->id) }}">{{ $data->pass_number }}</a></td>
                            <td style='white-space: pre-wrap; word-wrap: break-word;'><a href="{{ route('search.show', $data->id) }}">{{ $data->pass_name }} {{ $data->model }}</a></td>
                            <td style='white-space: pre-wrap; word-wrap: break-word;'>{{ $data->type_name_fasgrp }}</td>
                            <td>{{ DateThaiFull($data->str_date) }}</td>
                            <td>{{ $data->dep_name }}</td>
                            <td><span class="badge {{ $dcolor }}">{{ $dstatus }}</span></td>
                        </tr>
                        @endforeach

                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ url('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/select2.js') }}"></script>

    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/datatable.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>
@endsection
