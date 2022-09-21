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
                @if (Auth::user()->isadmin <= "1")
                <a href="{{ route('durable.create') }}" class="btn btn-outline-primary">
                    <i class="ti-plus mr-2"></i> เพิ่มครุภัณฑ์
                </a>
                @endif
            @endguest

        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="ti-check mr-2"></i> {{ $message }}
    </div>
    @endif

    @if ($message = Session::get('deletesuccess'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
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
                            <th class="text-center">สถานะ</th>
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
                            <td><a href="{{ route('search.show', $data->id) }}">{!! $ddel1 !!}{{ $data->pass_number }}{!! $ddel2 !!}</a></td>
                            <td style='white-space: pre-wrap; word-wrap: break-word;'><a href="{{ route('search.show', $data->id) }}">{!! $ddel1 !!}{{ $data->pass_name }} {{ $data->model }}{!! $ddel2 !!}</a></td>
                            <td style='white-space: pre-wrap; word-wrap: break-word;'>{!! $ddel1 !!}{{ $data->type_name_fasgrp }}{!! $ddel2 !!}</td>
                            <td>{!! $ddel1 !!}{{ DateThaiFull($data->str_date) }}{!! $ddel2 !!}</td>
                            {{-- <td class="text-right">{{ number_format($data->pass_price,2) }}</td> --}}
                            <td>{!! $ddel1 !!}{{ $data->dep_name }}{!! $ddel2 !!}</td>
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
                                            @if (Auth::user()->isadmin == "0")
                                            <a href="{{ route('durable.edit', $data->id) }}" class="dropdown-item">แก้ไข</a>
                                            {{-- <form id="deleteForm" action="{{ route('durable.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="hidden" name="image_del" value="{{ $data->image_filename }}">
                                                <input type="hidden" name="image2_del" value="{{ $data->image_filename2 }}">
                                                <input type="hidden" name="image3_del" value="{{ $data->image_filename3 }}">
                                                <input type="hidden" name="manual_file_del" value="{{ $data->manual_file1 }}">
                                            </form>
                                            <div class="dropdown-divider"></div> --}}
                                            {{-- <a href="#" class="dropdown-item text-danger" onclick="deleteConfirm()">*** ลบ ***</a> --}}
                                            @endif
                                        @endif
                                    </div>
                                </li>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
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

    <!-- Toast examples -->
    <script src="{{ url('assets/js/examples/toast.js') }}"></script>
    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>

    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ $message }}');
        });
    </script>
    @endif

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

    @if ($message = Session::get('deletesuccess'))
    <script>
        $(document).ready(function(){
            swal("ลบข้อมูลสำเร็จ!", "{{ $message }}", "error");
        });
    </script>
    @endif

@endsection
