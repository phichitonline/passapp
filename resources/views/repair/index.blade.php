@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'รายการส่งซ่อม |')

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
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>วันที่ส่งซ่อม</th>
                                <th>สาเหตุหรืออาการ</th>
                                <th>ผู้ส่งซ่อม</th>
                                <th>วันที่รับงาน</th>
                                <th>ช่างรับงาน</th>
                                <th>วันที่ซ่อมเสร็จ</th>
                                <th>ผู้รายงาน</th>
                                <th>มูลค่าการซ่อม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repairs as $repair)
                            <tr>
                                <td><a href="{{ route('repair.show', $repair->id) }}">
                                    <figure class="avatar avatar-ml mr-2">
                                        @if ($repair->repair_image == NULL)
                                            <img src="{{ url('assets/media/image/products/noimage.png') }}" class="rounded-circle" alt="">
                                        @else
                                            <img src="{{ url('images/repair/'.$repair->repair_image) }}" class="rounded-circle" alt="">
                                        @endif
                                    </figure>
                                    </a>
                                </td>
                                <td><a href="{{ route('repair.show', $repair->id) }}">{{ $repair->repair_date }}</a></td>
                                <td style='white-space: pre-wrap; word-wrap: break-word;'><a href="{{ route('repair.show', $repair->id) }}">{{ $repair->repair_text }}</a></td>
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
