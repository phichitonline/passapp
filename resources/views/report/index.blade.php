@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'รายงาน |')

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
        <form action="{{ route('report') }}" method="POST">
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
        <form action="{{ route('report') }}" method="POST">
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
                    <table id="DataExport" class="table table-small">
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

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
