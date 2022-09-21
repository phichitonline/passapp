@extends('layouts.app')

@section('bodyClass', 'small-navigation')

@section('title', 'รายชื่อผู้ใช้งาน |')

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
            <a href="{{ route('user.create') }}" class="btn btn-outline-primary">
                <i class="ti-plus mr-2"></i> เพิ่มผู้ใช้ใหม่
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
                    <table id="example1" class="table table-lg">
                        <thead>
                        <tr>
                            <th>{{ __('ชื่อ - สกุล') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('หน่วยงาน') }}</th>
                            <th>{{ __('ระดับผู้ใช้') }}</th>
                            <th>{{ __('วันที่ลงทะเบียน') }}</th>
                            <th class="text-right">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{-- <a href="#"> --}}
                                    <figure class="avatar avatar-sm mr-2">
                                        @if ($user->avatar == NULL)
                                            <img src="{{ url('assets/media/image/favicon.png') }}" class="rounded-circle" alt="">
                                        @else
                                            <img src="{{ url('images/user/'.$user->avatar) }}" class="rounded-circle" alt="">
                                        @endif
                                    </figure>
                                    {{ $user->name }}
                                {{-- </a> --}}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->dep_name }}</td>
                            <td>{{ $user->usertype }}</td>
                            <td>{{ DateThaiFull($user->created_at->format('Y-m-d')) }}</td>
                            <td class="td-actions text-right">
                                @if (Auth::user()->isadmin == "0")

                                @if ($user->id != auth()->id())

                                {{-- <form id="deleteForm" action="{{ route('user.destroy', $user) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input type="hidden" name="avatar_del" value="{{ $user->avatar }}">
                                </form> --}}

                                <a href="{{ route('user.edit', $user) }}" class="btn btn-outline-primary btn-sm btn-floating" data-toggle="tooltip" title="แก้ไข">
                                    <i class="ti-pencil"></i>
                                </a>
                                {{-- <a href="#" class="btn btn-outline-danger btn-sm btn-floating ml-2" data-toggle="tooltip" title="ลบ" onclick="deleteConfirm()">
                                    <i class="ti-trash"></i>
                                </a> --}}
                                @else
                                    <a href="{{ url('/') }}/profile" class="btn btn-outline-primary btn-sm btn-floating" data-toggle="tooltip" title="แก้ไข">
                                        <i class="ti-pencil"></i>
                                    </a>
                                @endif
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
            // return confirm('คุณแน่ใจที่จะลบผู้นี้');
            $(document).ready(function(){
            // swal("ยืนยัน!", "คุณต้องการลบผู้ใช้นี้", "error");

            swal({
            title: "คุณแน่ใจที่จะลบผู้ใช้นี้?",
            text: "เมื่อลบแล้ว คุณจะไม่สามารถกู้คืนผู้ใช้นี้ได้!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("ข้อมูลผู้ใช้ถูกลบแล้ว", {
                    //     icon: "error",
                    // });
                    document.getElementById("deleteForm").submit();
                } else {
                    // swal("คุณเปลี่ยนใจ! ข้อมูลผู้ใช้นี้ยังคงอยู่", {
                    //     icon: "success",
                    // });
                }
            });

        });
        }

        // $(document).ready(function () {
        //     $('.sweet-error').on('click', function () {
        //         swal("Good job!", "You clicked the button!", "error");
        //     });
        // }
    </script>

    @if ($message = Session::get('success2'))
    <script>
        $(document).ready(function(){
            swal("ลบข้อมูลสำเร็จ!", "{{ $message }}", "error");
        });
    </script>
    @endif

    @if ($message = Session::get('success3'))
    <script>
        $(document).ready(function(){
            toastr.info('{{ $message }}');
        });
    </script>
    @endif
    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ $message }}');
        });
    </script>
    @endif
    {{-- @if ($message = Session::get('success2'))
    <script>
        $(document).ready(function(){
            toastr.error('{{ $message }}');
        });
    </script>
    @endif --}}
@endsection
