@extends('layouts.app')

@section('title', 'หน่วยงาน |')

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
        @guest
        @else
            @if (Auth::user()->isadmin == "0")
            <a href="{{ route('department.create') }}" class="btn btn-outline-primary">
                <i class="ti-plus mr-2"></i> เพิ่มหน่วยงาน
            </a>
            @endif
        @endguest

    </div>
</div>

@if ($message = Session::get('success3'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <i class="ti-check mr-2"></i> {{ $message }}
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="ti-check mr-2"></i> {{ $message }}
</div>
@endif
@if ($message = Session::get('success2'))
<div class="alert alert-danger d-flex align-items-center" role="alert">
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
                    <table id="example1" class="table">
                        <thead>
                        <tr>
                            <th>{{ __('รหัส') }}</th>
                            <th>{{ __('ชื่อหน่วยงาน') }}</th>
                            <th>{{ __('วันที่ลงทะเบียน') }}</th>
                            <th class="text-right">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->depcode }}</td>
                            <td>{{ $department->dep_name }}</td>
                            <td>{{ DateThaiFull($department->created_at->format('Y-m-d')) }}</td>
                            <td class="td-actions text-right">
                                @if (Auth::user()->isadmin == "0")

                                {{-- <form id="deleteForm" action="{{ route('department.destroy', $department->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input type="hidden" name="departmentid" value="{{ $department->id }}">
                                </form> --}}

                                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-outline-primary btn-sm btn-floating" data-toggle="tooltip" title="แก้ไข">
                                    <i class="ti-pencil"></i>
                                </a>
                                {{-- <a href="#" class="btn btn-outline-danger btn-sm btn-floating ml-2" data-toggle="tooltip" title="ลบ" onclick="deleteConfirm()">
                                    <i class="ti-trash"></i>
                                </a> --}}
                                @endif
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

    <script>
        function deleteConfirm() {
            $(document).ready(function(){
            swal({
            title: "คุณแน่ใจที่จะลบรายการนี้?",
            text: "เมื่อลบแล้ว คุณจะไม่สามารถกู้คืนได้!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById("deleteForm").submit();
                } else {
                }
            });

        });
        }

    </script>

    @if ($message = Session::get('success3'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ $message }}');
        });
    </script>
    @endif

    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function(){
            toastr.info('{{ $message }}');
        });
    </script>
    @endif

    @if ($message = Session::get('success2'))
    <script>
        $(document).ready(function(){
            swal("ลบข้อมูลสำเร็จ!", "{{ $message }}", "error");
        });
    </script>
    @endif

@endsection
