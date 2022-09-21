@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'ทะเบียนครุภัณฑ์ |')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- Prism -->
    <link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }}</h3>
            @if (isset($_GET['keyword'])) <p class="card-title">ผลการค้นหา คำค้น "{{ $_GET['keyword'] }}"</p> @endif
            @guest
            @else
            @endguest

        </div>
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
                    {{-- <h4 class="card-title">ผลการค้นหา คำค้น "@if (isset($_GET['keyword'])) {{ $_GET['keyword'] }} @endif"</h4> --}}
                </div>
                <div class="table-responsive">
                    <table id="example1" class="table table-small">
                        <thead>
                        <tr>
                            <th>เลขครุภัณฑ์</th>
                            <th>รายการครุภัณฑ์</th>
                            <th>ประเภท</th>
                            <th>วันที่ได้รับ</th>
                            {{-- <th class="text-right">มูลค่า</th> --}}
                            <th>ใช้ประจำที่</th>
                            <th class="text-center">วันที่</th>
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
                            $ddel1 = "";
                            $ddel2 = "";
                        } elseif ($data->status == 4) {
                            $dstatus = DateThaiFull($data->status4_date);
                            $dcolor = "bg-danger-gradient text-white";
                            $ddel1 = "";
                            $ddel2 = "";
                        } elseif ($data->status == 9) {
                            $dstatus = DateThaiFull($data->status9_date);
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
                            {{-- <td class="text-right">{{ number_format($data->pass_price,2) }}</td> --}}
                            <td>{{ $data->dep_name }}</td>
                            <td>

                                <li class="nav-item dropdown">
                                    <a href="#" class="badge {{ $dcolor }} nav-link dropdown-toggle" data-toggle="dropdown">
                                        {{ $dstatus }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @guest
                                        <a href="{{ route('search.show', $data->id) }}" class="dropdown-item">ข้อมูล</a>
                                        @else
                                            <a href="{{ route('durable.show', $data->id) }}" class="dropdown-item">ข้อมูล</a>
                                            @if (Auth::user()->isadmin <= "1")
                                            <a href="{{ route('durable.edit', $data->id) }}" class="dropdown-item">แก้ไข</a>
                                            {{-- <form action="{{ route('durable.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="dropdown-divider"></div>
                                                <button class="dropdown-item text-danger" onClick="return confirm('ยืนยันการลบรายการนี้');">*** ลบ ***</button>
                                            </form> --}}
                                            @endif
                                        @endif
                                    </div>
                                </li>

                            </td>

                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/datatable.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>
@endsection
