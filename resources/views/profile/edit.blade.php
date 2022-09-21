@extends('layouts.app')
@section('title', 'สมาชิก |')

@section('head')
    <!-- Prism -->
    <link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="ti-check mr-2"></i> {{ $message }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('ข้อมูลผู้ใช้') }}</div>

                <div class="card-body">
                    <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-นามสกุล') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control text-red" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('ภาพผู้ใช้') }}</label>
                            <div class="col-md-6">
                                <div class="media">
                                    <figure class="avatar mr-3 slick-slide-item">
                                        @if (Auth::user()->avatar == NULL)
                                            <img src="{{ url('assets/media/image/user/testi-2.jpg') }}" class="rounded-circle" alt="" id="showAvatar">
                                        @else
                                            <img src="{{ url('images/user/'.Auth::user()->avatar) }}" class="rounded-circle" alt="" id="showAvatar">
                                        @endif
                                    </figure>
                                    <div class="media-body">
                                    <input id="avatarimg" type="file" class="form-control text-red" name="avatarimg" accept="image/*" onchange="loadAvatar(event)">
                                    <input type="hidden" class="form-control text-red" name="avatarimg_old" value="{{ Auth::user()->avatar }}">
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i>
                                    {{ __('บันทึก') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if ($message = Session::get('passsuccess'))
            <div class="toastr-examples alert alert-success d-flex align-items-center" role="alert">
                <i class="ti-check mr-2"></i> {{ $message }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('เปลี่ยนรหัสผ่าน') }}</div>

                <div class="card-body">
                    <form action="{{ route('profile') }}/password" method="POST" novalidate="novalidate">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านปัจจุบัน') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password">

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านใหม่') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่านใหม่') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i>
                                    {{ __('เปลี่ยนรหัสผ่าน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    var loadAvatar = function(event) {
        var showAvatar = document.getElementById('showAvatar');
        showAvatar.src = URL.createObjectURL(event.target.files[0]);
        showAvatar.onload = function() {
            URL.revokeObjectURL(showAvatar.src)
        }
    };
</script>

@endsection

@section('script')
    <!-- Toast examples -->
    <script src="{{ url('assets/js/examples/toast.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>

    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function(){
            swal("สำเร็จ!", "{{ $message }}", "success");
        });
    </script>
    @endif

    @if ($message = Session::get('passsuccess'))
    <script>
        $(document).ready(function(){
            swal("สำเร็จ!", "{{ $message }}", "success");
        });
    </script>
    @endif

    @if (Session::has('alertsuccess'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ $message }}');
        });
    </script>
    @endif

@endsection
