@extends('layouts.app')

@section('title', 'แก้ไขผู้ใช้ |')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>{{ $pagename }}</h3>
            {{-- <a href="{{ route('user.index') }}" class="btn btn-outline-warning">
                <i class="ti-control-backward mr-2"></i> กลับ
            </a> --}}
            <div class="dropdown">
                @guest
                @else
                    @if (Auth::user()->isadmin <= "1")
                        <form id="deleteForm" action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="userid" value="{{ $user->id }}">
                        </form>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-warning">
                            <i class="ti-control-backward mr-2"></i> กลับ
                        </a>
                        <a href="#" class="btn btn-outline-danger" onclick="deleteConfirm()"><i class="ti-trash mr-2"></i> ลบ</a>
                    @else
                    @endif
                @endif
            </div>
    </div>
</div>
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">
                <div class="card-header">{{ __('ข้อมูลผู้ใช้') }}</div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล') }}</label>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('ชื่อ - นามสกุล') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('depcode') ? ' has-danger' : '' }}">
                          <select id="depcode" name="depcode" class="js-example-basic-single">
                              @foreach ($department as $department)
                              <option value="{{ $department->depcode }}" @if ($department->depcode == $user->depcode) selected @endif>{{ $department->dep_name }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-md-4 col-form-label text-md-right">{{ __('ระดับผู้ใช้') }}</label>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('isadmin') ? ' has-danger' : '' }}">
                        <select id="isadmin" name="isadmin" class="js-example-basic-single">
                            @foreach ($usertype as $usertype)
                            <option value="{{ $usertype->type }}" @if ($usertype->type == $user->isadmin) selected @endif>{{ $usertype->usertype }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> บันทึก</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <form method="post" action="{{ route('user.password') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <input type="hidden" name="userid" value="{{ old('userid', $user->id) }}">
            <input type="hidden" name="name" value="{{ old('name', $user->name) }}">
            <input type="hidden" name="email" value="{{ old('email', $user->email) }}">
            <input type="hidden" name="depcode" value="{{ old('depcode', $user->depcode) }}">
            <input type="hidden" name="isadmin" value="{{ old('isadmin', $user->isadmin) }}">

            <div class="card ">
                <div class="card-header">{{ __('เปลี่ยนรหัสผ่าน') }}</div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-md-4 col-form-label text-md-right" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="input-password" placeholder="{{ __('รหัสผ่าน') }}" required/>
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-md-4 col-form-label text-md-right" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('ยืนยันรหัสผ่าน') }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> เปลี่ยนรหัสผ่าน</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
@endsection

@section('script')

    <!-- Select2 -->
    <script src="{{ url('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/select2.js') }}"></script>

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

@endsection
